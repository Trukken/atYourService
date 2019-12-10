<?php

namespace App\Http\Controllers;

use App\Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('register');
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
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                    'phone' => 'required'
                ]);

                //Return duplicate email error to the user
                $emails = User::all()->pluck('email');
                foreach ($emails as $email) {
                    if ($email == $request->email) {
                        $request->session()->put('email', $email);
                        return view('register', ['loginError' => 'Email already exists, Do you want to <a href="/login">login</a>?']);
                    }
                }
                $token = sha1(time()) . mt_rand(100000, 999999);
                $newUser = new User;
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->password);
                $newUser->phone_number = $request->phone;
                $newUser->email_verified = false;
                $newUser->verification_token = $token;
                $newUser->save();
                $details = [
                    'name' => $newUser->name,
                    'token' => $token,
                ];
                \Mail::to($newUser->email)->send(new \App\Mail\Mail($details));
                auth()->login($newUser);
                return redirect('');
            } else {
                return view('register', ['loginError' => 'You can not enter data that fast.']);
            }
        }
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
    public function verify($token)
    {
        //9fe1d37ece96644eaf44f2252b8384813cfbc757203642
        $users = User::all();
        foreach ($users as $user) {
            if ($user->verification_token == $token && !empty($user->verification_token)) {
                User::where('id', '=', $user->id)->update(['email_verified' => true, 'verification_token' => null]);
                return redirect('/');
            }
        }
        return 'The verification key had expired.';
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
}
