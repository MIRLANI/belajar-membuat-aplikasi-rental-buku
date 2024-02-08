<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(): Response
    {
        return response()->view("pages.profile");
    }
}
