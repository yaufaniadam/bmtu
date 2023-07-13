<?php

namespace App\Http\Controllers;

use App\Services\InformationService;

class InformationController extends Controller
{
    public function index()
    {
        return view('admin.information.index')
            ->with(['informations' => InformationService::InformationIndex()]);
    }

    public function show($id)
    {
        // dd(InformationService::InformationDetail($id));
        return view('admin.information.detail')
            ->with(['postdetail' => InformationService::InformationDetail($id)]);
    }
}
