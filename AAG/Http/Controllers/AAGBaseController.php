<?php

namespace AAG\Http\Controllers;

use App\Http\Controllers\Controller;

class AAGBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
