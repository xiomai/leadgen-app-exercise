<?php

namespace AAG\Http\Controllers;

class DashboardController extends AAGBaseController
{

    public function index()
    {
        return view('AAG::dashboard');
    }
}
