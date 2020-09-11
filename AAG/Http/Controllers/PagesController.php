<?php

namespace AAG\Http\Controllers;

use AAG\Models\Page;
use AAG\Models\PageVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends AAGBaseController
{

    public function index()
    {
        $pages = Page::withCount('versions', 'leads')->get();

        return view('AAG::pages.index')->with(compact('pages'));
    }

    public function show(Page $page)
    {
        $page->load('versions', 'version');

        return view('AAG::pages.show')->with(compact('page'));
    }

    public function create()
    {
        $page = new Page();

        return view('AAG::pages.create_edit')->with(compact('page'));
    }

    public function store(Request $request)
    {

        try {
            $pageCreateData = $request->only(['title', 'type', 'description']);
            $page           = Page::create($pageCreateData);

            $pageVersionsRequestData = $request->only(['cta_text_1', 'cta_text_color_1', 'cta_color_1', 'cta_text_2', 'cta_text_color_2', 'cta_color_2']);
            // dd($pageVersionsRequestData);

            $page->versions()->create([
                'cta_text'         => $pageVersionsRequestData['cta_text_1'],
                'cta_text_color'   => $pageVersionsRequestData['cta_text_color_1'],
                'cta_button_color' => $pageVersionsRequestData['cta_color_1'],
            ]);

            if (!!$pageVersionsRequestData['cta_text_2']) {
                $page->versions()->create([
                    'cta_text'         => $pageVersionsRequestData['cta_text_2'],
                    'cta_text_color'   => $pageVersionsRequestData['cta_text_color_2'],
                    'cta_button_color' => $pageVersionsRequestData['cta_color_2'],
                ]);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('aag.pages.show', [
            'page' => $page
        ]);
    }

    public function edit(Page $page)
    {
        $page->load('versions');

        return view('AAG::pages.create_edit')->with(compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        // dd($request->all());

        try {
            $pageUpdateData = $request->only(['title', 'type', 'description']);
            $page->update($pageUpdateData);

            $pageVersionsRequestData = $request->only(['cta_v1_id', 'cta_text_1', 'cta_text_color_1', 'cta_color_1', 'cta_v2_id', 'cta_text_2', 'cta_text_color_2', 'cta_color_2']);

            $pageVersion1 = PageVersion::find($pageVersionsRequestData['cta_v1_id']);
            $pageVersion1->update([
                'cta_text'         => $pageVersionsRequestData['cta_text_1'],
                'cta_text_color'   => $pageVersionsRequestData['cta_text_color_1'],
                'cta_button_color' => $pageVersionsRequestData['cta_color_1']
            ]);

            /**
             * Update the second version
             */
            if (!!$pageVersionsRequestData['cta_v2_id']) {
                $pageVersion2 = PageVersion::find($pageVersionsRequestData['cta_v2_id']);
                $pageVersion2->update([
                    'cta_text'         => $pageVersionsRequestData['cta_text_2'],
                    'cta_text_color'   => $pageVersionsRequestData['cta_text_color_2'],
                    'cta_button_color' => $pageVersionsRequestData['cta_color_2']
                ]);
            }

            /**
             * Create the second version if id is `null`
             * and cta_text_2 has value
             */
            if (!$pageVersionsRequestData['cta_v2_id'] && !!$pageVersionsRequestData['cta_text_2']) {
                $page->versions()->create([
                    'cta_text' => $pageVersionsRequestData['cta_text_2'],
                    'cta_button_color' => $pageVersionsRequestData['cta_color_2'],
                ]);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('aag.pages.show', [
            'page' => $page
        ]);
    }

    public function download_leads(Page $page)
    {
        $page->load('leads');
        $leads = $page->leads;

        if (!$leads) {
            return 'There are no leads yet on this page.';
        }

        $headers = [
            'email',
            'lp_id',
            'version_id',
            'converted_at',
            'opened_at',
            'type',
            'attachment_opened_at',
        ];

        $headersJoined = join(', ', $headers);
        $ts            = now()->timestamp;
        $filename      = "leads_page_id_{$page->id}_{$page->type}_{$ts}.csv";
        $exportPath    = "storage/exports/{$filename}";

        Storage::append($exportPath, $headersJoined);

        $leads->each(function ($lead) use ($exportPath) {

            // $lead->load('page');

            $line = [
                $lead->email,
                $lead->page_id,
                $lead->page_version_id,
                $lead->created_at->format('Y-m-d H:i:s'),
                $lead->email_opened_at ?: 'NULL',
                'lead_magnet',
                $lead->attachment_opened_at ?: 'NULL',
            ];

            $lineJoined = join(',', $line);

            Storage::append($exportPath, $lineJoined);
        });

        $headers = ['Content-type' => ' text/csv',];

        return response()->download(
            storage_path("app/storage/exports/{$filename}"),
            null,
            $headers
        );
    }
}
