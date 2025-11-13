<?php

use App\Http\Controllers\ContactEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('contact')->group(function() {
    Route::post('send-to-author', [ContactEmailController::class, 'mailAuthor']);
    Route::get('preview-to-author', [ContactEmailController::class, 'previewMail']);
});
