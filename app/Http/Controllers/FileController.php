<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function displayImage(Request $request)
    {

        $validated = $request->validate([
            'file' => 'string', 'max:255'
        ]);

        if (empty($validated['file'])) {
            abort(404);
        }

        if (Storage::exists($validated['file'])) {
            $content = Storage::get($validated['file']);
            if ($content != null) {
                $mime = Storage::mimeType($content);
                $response = Response::make($content, 200);
                $response->header("Content-Type", $mime);
                return $response;
            }
            abort(404);
        } else {
            abort(404);
        }
    }

    public function downloadFile()
    {
    }
}
