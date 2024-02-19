<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    // register
    public function showregistre(){
        return view('authentication.register');
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = 1;

        User::create($data);

        return redirect('/login');
    }


    //login
    public function showlogin()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->regenerate();
            $request->session()->put("user", $user);

            return redirect()->route('dashboard');

        } else {
            // Authentication failed
            return redirect()->back()->withInput($request->only('email'));
        }
    }

        //logout

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->forget('user_id');
        $request->session()->invalidate();
        return redirect('/login');
    }

    // Forget password
    public function forgetpassowrdform()
    {
        return view('authentication.forgetpasswordform');
    }

    public function sendResetPwd(Request $request)
    {

        $user= User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', "please check your email and reset your password");
        }else{
            return redirect()->back()->with('error', "email not found in the system");
        }
    }

    public function rest($remember_token)
    {
        $user= User::getToken($remember_token);
        if (!empty($user))
        {
            return view('authentication.reset', compact('user'));
        }
        else
        {
            abort(404);
        }
    }

    public function postrest(Request $request)
    {
        if ($request->password == $request->ConfirmPassword)
        {
            $user = User::getToken($request->remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect(url('authentication.login'))->with('success', "Password Successfully reset");
        }
        else
        {
            return redirect()->back()->with('error', 'password and confirm password does not match ');
        }
    }


}
