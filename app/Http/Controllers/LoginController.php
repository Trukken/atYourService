<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()) {
            return redirect('')->withErrors(['You are already logged in!']);
        } else {
            return view('login');
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
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function login(Request $request)
    {
        //Code that I copied from the internet, its like magic. https://github.com/durgesh-sahani/google-recaptcha-integration-php/blob/master/index.php
        if (isset($_POST['submit'])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = [
                'secret' => '6LeqRcYUAAAAABcma1DiapUfHaPrD0qREXSv4064',
                'response' => $_POST['token']
            ];
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $res = json_decode($response, true);
            if ($res['success'] == true) {
                // Perform you logic here for ex:- save you data to database
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required'
                ]);
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                    if (Auth::user()->banned == true) {
                        Auth::logout();
                        return redirect('/')->withErrors(['msg' => 'Your account is suspended, contact our support to gain more information.']);
                    }
                    return redirect('/');
                } else {
                    return redirect('login')->withErrors(['msg' => 'Check your password and email.']);
                }
            } else {
                return redirect('login')->withErrors(['msg' => 'Bot detected.']);
            }
        }
    }
}
