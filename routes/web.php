<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    include '_/admin.php';
});

Route::prefix('/')->group(function () {
    include '_/user.php';
});
