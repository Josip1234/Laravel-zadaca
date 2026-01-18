<?php

use App\Http\Controllers\OsobaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vrste-osoba',[OsobaController::class,'prikazVrstaOsoba']);
Route::get('/osobe',[OsobaController::class,'prikazOsobaSVrstamaOsoba'])->middleware('provjeri.osobu');