<?php

use Illuminate\Support\Facades\Route;

Route::resource('task', \App\Http\Controllers\TasksController::class);

Route::get('/', function () {
    return redirect()->route('task.index');
});