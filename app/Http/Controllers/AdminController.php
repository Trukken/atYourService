<?php

namespace App\Http\Controllers;

use App\Report;
use App\Service;
use App\User;
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

            $handledReports = Report::where('handled', '=', 1)->join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->paginate(5, ['*'], 'handledReports');
            $unhandledReports = Report::where('handled', '=', 0)->join('services', 'reports.service_id', '=', 'services.id')->join('users', 'services.user_id', '=', 'users.id')->select('reports.*', 'services.name', 'users.name as user_name')->paginate(5, ['*'], 'unhandledReports');
            return view('reportControlPanel', ['handledReports' => $handledReports, 'unhandledReports' => $unhandledReports]);
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
            return redirect('/control-panel')->withErrors(['msg' => 'Service id: ' . $id . ' had been black-listed.']);
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
            return redirect('/control-panel')->withErrors(['msg' => 'User id: ' . $id . ' had been unbanned.']);
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
            return redirect('/control-panel')->withErrors(['msg' => 'Report id: ' . $request->id . ' had been trashed.']);
        } else {
            return redirect('');
        }
    }
    public function userControl(Request $request)
    {
        if (Auth::user() && Auth::user()->admin == true) {
            if ($request->status == 'ban') {
                User::where('id', '=', $request->id)->update(['banned' => true]);
                return redirect('/control-panel')->withErrors(['msg' => 'User id: ' . $request->id . ' had been banned.']);
            } else if ($request->status == 'unban') {
                User::where('id', '=', $request->id)->update(['banned' => false]);
                return redirect('/control-panel')->withErrors(['msg' => 'User id: ' . $request->id . ' had been unbanned.']);
            }
        } else {
            return redirect('');
        }
    }
    public function displayOptions(){
        if(Auth::user() && Auth::user()->admin == true){
            return view('admin-panel');
        }else{
            return redirect('')->withErrors(['msg'=>'You do not have permission to see that page.']);
        }
    }
    public function redirect(Request $request){
        if(Auth::user()&&Auth::user()->admin==true){
            $request->validate([
                'adminControl'=>'required'
            ]);
            if($request->adminControl=="displayUsers"){
                return 'TODO:: users';
            }else if($request->adminControl=="displayServices"){
                return 'TODO:: services';
            }else if($request->adminControl=="displayReports"){
                return redirect('/control-panel');
            }
        }else{
            return redirect('')->withErrors(['msg'=>'You do not have permission to see that page.']);
        }
    }
}
