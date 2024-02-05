<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
     public function profile(Request $request):Response
     {
        // $request->session()->flush();
        return response()->view("profile");
     }


}
