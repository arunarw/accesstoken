<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/members', [MemberController::class, 'show']);
Route::post('/save-member', [MemberController::class, 'saveMember']);
Route::get('/delete-member/{member}', [MemberController::class, 'deleteMember']);
