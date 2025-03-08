<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Random;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function register()
    {
        return view('users.register');
    }
    public function listUser()
    {
        return view('pages.products.listUser');
    }
    public function saveregister(Request $request)
    {
        // dd($request->all());

        User::create([
            'name' => $request->name,
            'role' => 'user',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return view('users.login');
    }
}
