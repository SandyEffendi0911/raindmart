<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manage'], function () {
    if (file_exists(__DIR__ . '/manage/R_Manage.php')) {
        include 'manage/R_Manage.php';
    }
});
