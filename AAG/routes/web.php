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

Route::group(['prefix' => 'lp/image/attachment'], function () {
    Route::get('appEmailLogo/{lead?}', 'ImageAttachmentController@appEmailLogo')->name('aag.lp.image.attachment.appEmailLogo');
});
Route::group(['prefix' => 'lp/file/attachment'], function () {
    Route::get('leadMagnetExerciseAttachmentFile/{lead?}', 'FileAttachmentController@leadMagnetExerciseAttachmentFile')->name('aag.lp.file.attachment.leadMagnetExerciseAttachmentFile');
});

Route::group(['prefix' => 'mail/preview'], function () {
    Route::get('exercise', function () {
        $lead = \AAG\Models\Lead::find(1);
        return new AAG\Mail\ExerciseLeadMagnetMail($lead);
    })->name('aag.email.leadmagnet.exercise.preview');
});

Route::get('test', function () {
    // $page = \AAG\Models\Page::withCount(['leadsEmailOpened', 'leadsAttachmentOpened'])->find(1);

    // dd($page->toArray());
    $page = \AAG\Models\Page::find(1);

    dd($page->clickThroughRate);
});
