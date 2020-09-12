<?php

namespace AAG\Http\Controllers;

use AAG\Jobs\EmailOpenedJob;
use AAG\Models\Lead;
use Illuminate\Http\Request;

class ImageAttachmentController extends AAGBaseController
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function appEmailLogo(Request $request, Lead $lead)
    {
        $storagePath = public_path('/images/leadgen-app-logo.png');

        EmailOpenedJob::dispatchAfterResponse($lead);

        return response()->file($storagePath);
    }
}
