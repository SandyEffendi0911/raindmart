<?php

use App\Http\Controllers\IT\ItController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItController::class, 'index'])->name('manage');

Route::get('/user-add', [ItController::class, 'user_add']);
