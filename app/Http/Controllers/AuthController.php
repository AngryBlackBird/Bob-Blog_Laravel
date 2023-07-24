<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route("home"));
        }
        return to_route("auth.login")->withErrors(["email"=>"Une erreur est survenue"])->onlyInput("email");
    }

    public function subscribe(): View
    {
        return view('auth.subscribe');
    }

    public function doSubcribe(SubscribeRequest $request)
    {
        $credentials = $request->validated();

        $user = new User();
        $user->name = $credentials["name"];
        $user->email = $credentials["email"];
        $user->password = Hash::make($credentials["password"]);
        $user->save();

        Auth::login($user);
        return redirect()->route("home");
    }
}
