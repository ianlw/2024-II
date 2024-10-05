<?php

use App\Http\Controllers\PracticaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('practica', PracticaController::class);
