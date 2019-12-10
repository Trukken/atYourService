<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ForgotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forgotPassword');
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
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {

        $users = User::all();
        foreach ($users as $user) {
            if ($user->password_reset == $token && !empty($user->password_reset)) {
                //User::where('id', '=', $user->id)->update(['email_verified' => true, 'verification_token' => null]);
            }
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
    {
        //
    }

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
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $emails = User::all()->pluck('email');
        $users = User::all();
        $userFound = false;
        $name = '';
        foreach ($users as $user) {
            if($user->email == $request->email){
                $userFound = true;
                $name = $user->name;
            }
        }
        if($userFound){
        $details = [
            'email' => $request->email,
            'name' => $name,
            'token' => sha1(time()) . mt_rand(1000000, 9999999)
        ];
        \Mail::to($request->email)->send(new \App\Mail\ResetPassword($details));
        return 'An e-mail was sent to the given address, follow the instructions in the email.';
        }else{
            return view('forgotPassword',['emailError'=>'The email you have entered does not exist.']);
        }

    }
}
