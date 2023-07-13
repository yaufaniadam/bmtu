<?php

namespace App\Http\Controllers;

use App\Services\InformationService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        // dd(Http::withoutVerifying()->withHeaders([])->get("https://hrd.bmtumy.com/wp-json/wp/v2/categories", [
        //     "per_page" => 15,
        //     "_embed" => ''
        // ])->json());
        return view('document.index')
            ->with(['informations' => InformationService::DocumentIndex()]);
    }

    public function show($id)
    {
        return view('document.detail')
            ->with(['sop' => InformationService::DocumentDetail($id)]);
    }

    public function download(Request $request)
    {
        $document = InformationService::DownloadDocument($request->parent);
        return redirect()->to($document);
    }
}
