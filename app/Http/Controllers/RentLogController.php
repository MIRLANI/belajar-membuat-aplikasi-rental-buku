<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RentLogController extends Controller
{
    public function index(): Response
    {
        return response()->view("pages.rent_log");
    }


    

}
