<?php

namespace AAG\Http\Controllers;

use AAG\Jobs\AttachmentOpenedJob;
use AAG\Models\Lead;
use Illuminate\Http\Request;

class FileAttachmentController extends AAGBaseController
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function leadMagnetExerciseAttachmentFile(Request $request, Lead $lead)
    {
        $storagePath = public_path('/storage/downloads/cleaning-tips.pdf');

        AttachmentOpenedJob::dispatch($lead);

        return response()->file($storagePath);
    }
}
