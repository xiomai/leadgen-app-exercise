<?php

namespace AAG\Http\Controllers;

class PagesController extends AAGBaseController
{

    public function create()
    {
        return view('AAG::pages.create');
    }
}
