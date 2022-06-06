<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HamzeController;

Route::get('/bye', [HamzeController::class, 'sayBye'])->name("say-bye");
Route::get('/countPalindromes', [HamzeController::class, 'countPalindromes'])->name("countPalindromes");
Route::get('/countSeconds', [HamzeController::class, 'countSeconds'])->name("countSeconds");
Route::get('/groudStudents', [HamzeController::class, 'groudStudents'])->name("groudStudents");
Route::get('/nominee', [HamzeController::class, 'nominee'])->name("nominee");

