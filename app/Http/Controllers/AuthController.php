<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(): Response
    {
        return response()->view("auth.login");
    }

    public function register(): Response
    {
        return response()->view("auth.register");
    }


    public function authentication(UserRequest $request): RedirectResponse
    {
        
        // digunakan untuk menyimpan mudahkan user supaya tidak memasukan lagi  datanya berulang kali
        Session::flash("username", $request->input("username"));
        Session::flash("password", $request->input("password"));

        // ketika Auth:attempt itu berhasil maka secara otomatis laravel akan dibuatkan session
        if (Auth::attempt([
            "username" => $request->input("username"),
            "password" => $request->input("password")
            ])) {
                if (Auth::user()->status != "active") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->redirectTo("login");
    }

    public function doRegister(UserRegisterRequest $request)
    {
       
        User::query()->create($request->all());
        
        Session::flash("status");
        return redirect("register")->with("message", "Berhasil melakukan register silahkan hubungi admin untuk tahap selanjutnya");

    }
}
