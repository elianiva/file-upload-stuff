<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function processFileUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->input('name') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = url('uploads/' . $filename);
            return redirect()->route('file-upload-result')->with([
                'imageName' => $filename,
                'imageUrl' => $imageUrl,
            ]);
        }
    }

    public function fileUploadResult()
    {
        return view('file-upload-result', [
            'imageName' => session('imageName'),
            'imageUrl' => session('imageUrl'),
        ]);
    }
}
