<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'lp'], function () {
    Route::post('{page_version}/convert', 'APIController@handleConversion')->name('aag.api.v1.lp.exercise');
});
