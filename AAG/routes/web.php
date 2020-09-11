<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('aag.dashboard.index');

Route::group(['prefix' => 'pages'], function () {
    Route::get('', 'PagesController@index')->name('aag.pages.index');
    Route::post('', 'PagesController@store')->name('aag.pages.store');
    Route::get('create', 'PagesController@create')->name('aag.pages.create');
    Route::get('{page}', 'PagesController@show')->name('aag.pages.show');
    Route::patch('{page}', 'PagesController@update')->name('aag.pages.update');
    Route::get('{page}/edit', 'PagesController@edit')->name('aag.pages.edit');
    Route::get('{page}/download_leads', 'PagesController@download_leads')->name('aag.pages.download_leads');
});

Route::group(['prefix' => 'lp'], function () {
    Route::get('exercise', 'LandingPagesController@exercise')->name('aag.lp.exercise');
});

Route::group(['prefix' => 'mail/preview'], function () {
    Route::get('exercise', function () {
        return new AAG\Mail\ExerciseLeadMagnetMail();
    })->name('aag.email.leadmagnet.exercise.preview');
});
