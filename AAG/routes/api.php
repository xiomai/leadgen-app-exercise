<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pages'], function () {
    Route::get('{page}/leads', 'APIController@listLeads')->name('aag.api.v1.pages.leads');
});

Route::group(['prefix' => 'lp'], function () {
    Route::post('{page_version}/convert', 'APIController@handleConversion')->name('aag.api.v1.lp.exercise');
});
