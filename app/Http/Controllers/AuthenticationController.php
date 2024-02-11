<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $data['role_id'] = 2;

        User::create($data);

        return redirect('/login');
    }


    //login
    public function showlogin()
    {
        return view('authentication\login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
         //   $request->session()->start();
          //  $request->session()->put("user_id", $user->id);

            return redirect()->intended('/dashboard');

        } else {
            // Authentication failed
            return redirect()->back()->withInput($request->only('email'));
        }
    }


        //logout

    public function logout(Request $request)
    {
        $request->session()->forget('logout');

        return redirect('/login');
    }

}
