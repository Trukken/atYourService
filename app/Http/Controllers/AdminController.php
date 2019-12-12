<?php

namespace App\Http\Controllers;

use App\Report;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->admin == true) {
            $reports = Report::join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->get();
            return view('controlPanel', ['reports' => $reports]);
        } else {
            return redirect('');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user() && Auth::user()->admin == true) {
            Service::where('id', '=', $id)->update(['banned' => true]);
            //TODO: Remove reports, or make them handled;
            Report::where('service_id', '=', $id)->update(['handled' => true]);
            $reports = Report::join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->get();
            return view('controlPanel', ['notification' => 'Service id: ' . $id . ' had been black-listed.', 'reports' => $reports]);
        } else {
            return redirect('');
        }
    }

    public function unban($id)
    {
        if (Auth::user() && Auth::user()->admin == true) {
            Service::where('id', '=', $id)->update(['banned' => false]);
            //TODO: Remove reports, or make them handled;
            Report::where('service_id', '=', $id)->update(['handled' => true]);
            $reports = Report::join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->get();
            return view('controlPanel', ['notification' => 'Service id: ' . $id . ' had been removed from black-list.', 'reports' => $reports]);
        } else {
            return redirect('');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function trash(Request $request)
    {
        if (Auth::user()->admin == true) {

            Report::where('id', '=', $request->id)->update(['handled' => true]);
            $reports = Report::join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->get();
            return view('controlPanel', ['notification' => 'Report id: ' . $request->id . ' had been trashed, you can still find it under handled reports.', 'reports' => $reports]);
        } else {
            return redirect('');
        }
    }
}
