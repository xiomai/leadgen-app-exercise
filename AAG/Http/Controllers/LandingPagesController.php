<?php

namespace AAG\Http\Controllers;

class LandingPagesController extends AAGBaseController
{

    public function exercise()
    {
        return view('AAG::lp.exercise');
    }
}
