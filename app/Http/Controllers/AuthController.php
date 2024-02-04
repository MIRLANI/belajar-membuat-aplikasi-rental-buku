<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(): Response
    {
        return response()->view("login");
    }

    public function register(): Response
    {
        return response()->view("register");
    }


    public function authentication(UserRequest $request): RedirectResponse
    {
        
        if (Auth::attempt([
            "username" => $request->input("username"),
            "password" => $request->input("password")
            ])) {
                if (Auth::user()->status != "active") {
                    Session::flash("status");
                    Session::flash("message", "Akun kamu belum aktif. Segera hubungi admin!");
                    
                    return redirect()->route("login");
                }
                
            $request->session()->put("user", $request->input("username"));

            if (Auth::user()->role_id == 1) {
                return redirect("/dashboard");
            }
            if (Auth::user()->role_id == 2) {
                return redirect("/profile");
            }
        } else {
            Session::flash("status");
            return redirect()->route("login")->with("message", "username atau password anda salah");
        }
    }
}