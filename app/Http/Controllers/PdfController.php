<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function downloadSkpts($fileName)
    {
        $filePath = "skpts/{$fileName}";

        if (Storage::exists($filePath)) {
            $fullPath = Storage::path($filePath);
            return response()->file($fullPath, [
                'Content-Type' => 'application/pdf',
            ]);
        }

        return abort(404, 'File tidak ditemukan');
    }

    public function downloadKutipan($fileName)
    {
        $filePath = "kutipan/{$fileName}";

        if (Storage::exists($filePath)) {
            $fullPath = Storage::path($filePath);
            return response()->file($fullPath, [
                'Content-Type' => 'application/pdf',
            ]);
        }
    }
}
