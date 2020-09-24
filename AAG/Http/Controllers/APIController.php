<?php

namespace AAG\Http\Controllers;

use AAG\Http\Resources\PageResource;
use AAG\Jobs\SendLeadMagnetMailJob;
use AAG\Models\Page;
use AAG\Models\PageVersion;
use Illuminate\Http\Request;

class APIController extends AAGAPIBaseController
{

    public function listLeads(Page $page)
    {
        $page->load('leads');

        return new PageResource($page);
    }

    public function handleConversion(Request $request, PageVersion $pageVersion)
    {
        // \DB::table('leads')->delete();

        $data  = $request->only(['email']);
        $email = $data['email'];

        try {
            $lead = $pageVersion->leads()->create([
                'email'   => $email,
                'page_id' => $pageVersion->page_id
            ]);

            SendLeadMagnetMailJob::dispatch($lead);
        } catch (\Throwable $th) {

            $throwCode    = $th->getCode();
            $throwMessage = $throwCode == '23000' ? 'You have already submitted your email. Please check your mailbox. Thank you!' : $th->getMessage();

            $errorMessage = [
                'code'    => $th->getCode(),
                'message' => $throwMessage,
            ];

            return response()->json($errorMessage, 422);
        }


        return response()->json($data);
    }
}
