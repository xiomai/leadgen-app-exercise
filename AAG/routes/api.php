<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'lp'], function () {
    Route::post('convert', 'APIController@handleConversion')->name('aag.api.v1.lp.test');
});
