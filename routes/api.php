<?php

use App\Models\Member;
use Illuminate\Support\Facades\Route;

Route::get('/load-members', function () {
    return response()->json(['members' => Member::query()->get()]);
});
