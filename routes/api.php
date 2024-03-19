<?php

use App\Http\Controllers\Api\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(PersonController::class)->group(function(){

    Route::get('/persons', 'index');
    Route::post('/person', 'store');
    Route::put('/person/{id}', 'update');
    Route::delete('/person/{id}', 'destroy');

});

