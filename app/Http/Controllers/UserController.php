<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
     public function index(Request $request): Response
     {
        return response()->view("pages.users");
     }


}
