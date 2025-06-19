<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrialReqListController extends Controller
{
    public function index()
    {
        return view('front-office.admin.demo-trial.request-list');
    }
}
