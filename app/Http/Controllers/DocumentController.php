<?php

namespace App\Http\Controllers;

use App\Services\InformationService;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index')
            ->with(['informations' => InformationService::InformationIndex()]);
    }

    public function show($id)
    {
        // dd(InformationService::InformationDetail($id));
        return view('document.detail')
            ->with(['postdetail' => InformationService::InformationDetail($id)]);
    }
}
