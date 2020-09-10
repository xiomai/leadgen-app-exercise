<?php

use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('aag.dashboard.index');

Route::group(['prefix' => 'pages'], function () {
    Route::get('create', 'PagesController@create')->name('aag.pages.create');
});

Route::group(['prefix' => 'lp'], function () {
    Route::get('exercise', 'LandingPagesController@exercise')->name('aag.lp.exercise');
});

Route::group(['prefix' => 'mail/preview'], function () {
    Route::get('exercise', function () {

        $user = User::find(1);

        Mail::to($user)->send(new AAG\Mail\ExerciseLeadMagnetMail());

        return new AAG\Mail\ExerciseLeadMagnetMail();
    });
});
