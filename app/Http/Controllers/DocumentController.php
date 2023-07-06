<?php

namespace App\Http\Controllers;

use App\Services\InformationService;
use Illuminate\Support\Facades\Http;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index')
            ->with(['informations' => InformationService::DocumentIndex()]);
    }

    public function show($id)
    {

        return view('document.detail')
            ->with(['postdetail' => InformationService::DocumentDetail($id)]);
    }
}
