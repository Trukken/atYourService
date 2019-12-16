<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

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
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        if (Auth::user()) {

            //$user = User::where('id', '=', $id)->get();
            $user = \App\User::find($id);
            if ($user->id == Auth::user()->id || Auth::user()->admin == true) {
                $user = \App\User::find($id);

                return view('myaccount', ["user" => $user]);
            }
            return redirect('')->withErrors(['msg' => 'You can not edit another user\'s service!']);
        }
        return redirect('')->withErrors(['msg' => 'You can not edit that!']);

        //
    }

    
    public function update(Request $request, $id)
    {
        //UPDATE THE FORM
        $user = \App\User::find($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->image = $request->image;
        $user->banned = 0;

        $user->save();
        return  redirect('/user/' . $id)->withErrors(['msg' => 'Service has been updated!']);
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
