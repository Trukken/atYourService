<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            if (!empty($user->password_reset) && $user->password_reset == $token) {
                //User::where('id', '=', $user->id)->update(['email_verified' => true, 'verification_token' => null]);
                return view('forgotInput');
            }
        }
        return redirect("/forgotpassword")->withErrors(['msg' => 'The token has expired.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token)
    {
        //
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $users = User::all();
        foreach ($users as $user) {
            if ($user->password_reset == $token && !empty($user->password_reset)) {
                //User::where('id', '=', $user->id)->update(['email_verified' => true, 'verification_token' => null]);
                $password = filter_var($request->password, FILTER_SANITIZE_STRING);

                User::where('id', '=', $user->id)->update(['password' => Hash::make($password)]);
                $request->session()->put('email', $user->email);
                return redirect('login');
            }
        }
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
            if ($user->email == $request->email) {
                $userFound = true;
                $name = $user->name;
            }
        }
        $token = sha1(time()) . mt_rand(1000000, 9999999);
        if ($userFound) {
            $details = [
                'email' => $request->email,
                'name' => $name,
                'token' => $token,
                'subject' => 'Atyourservice Forgot Password'
            ];

            User::where('id', '=', $user->id)->update(['password_reset' => $token]);
            \Mail::to($request->email)->send(new \App\Mail\ResetPassword($details['subject'], $details));
            return redirect('/login',)->withErrors(['msg' => 'An e-mail was sent to the given address, follow the instructions in the email.']);
        } else {
            return view('forgotPassword', ['emailError' => 'The email you have entered does not exist.']);
        }
    }
}
