<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetInTouchController extends Controller
{
    public function index()
    {
        return view('front-office.admin.get-in-touch');
    }
}
