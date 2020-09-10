<?php

namespace AAG\Http\Controllers;

use AAG\Mail\ExerciseLeadMagnetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class APIController extends AAGAPIBaseController
{

    public function handleConversion(Request $request)
    {
        $data = $request->only(['email']);
        $email = $data['email'];

        Mail::to($email)->send(new ExerciseLeadMagnetMail());

        return response()->json($data);
    }
}
