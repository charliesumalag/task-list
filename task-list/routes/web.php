<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'name' => 'charlie'
    ]);
})->name('task-list');

Route::fallback(function () {
    return 'walang page';
});
