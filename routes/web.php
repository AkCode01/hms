<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/*
        // for web
        Route::resources([
            'posts' => PostController::class,
            'photos' => PhotoController::class
        ]);
    */