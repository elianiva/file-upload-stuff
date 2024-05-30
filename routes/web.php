<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/file-upload', [FileUploadController::class, 'fileUpload'])->name('file-upload');
Route::post('/file-upload', [FileUploadController::class, 'processFileUpload']);
Route::get('/file-upload-result', [FileUploadController::class, 'fileUploadResult'])->name('file-upload-result');
