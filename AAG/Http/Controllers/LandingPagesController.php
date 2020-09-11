<?php

namespace AAG\Http\Controllers;

use AAG\Models\Page;

class LandingPagesController extends AAGBaseController
{

    public function exercise()
    {
        $page = Page::find(1);
        $randomVersion = $page->randomVersion->load('page');

        return view('AAG::lp.exercise')->with([
            'pageVersion' => $randomVersion
        ]);
    }
}
