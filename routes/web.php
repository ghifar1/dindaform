<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [\App\Http\Controllers\FormSurveyController::class, 'index']);
Route::post('/form', [\App\Http\Controllers\FormSurveyController::class, 'insert']);
Route::get('/form/{id}', [\App\Http\Controllers\FormSurveyController::class, 'show']);
Route::post('/formdata', [\App\Http\Controllers\FormDataController::class, 'insert']);
Route::delete('/form/{id}', [\App\Http\Controllers\FormSurveyController::class, 'destroy']);
Route::delete('/formdata/{id}', [\App\Http\Controllers\FormDataController::class, 'destroy']);