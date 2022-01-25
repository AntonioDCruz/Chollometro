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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::view('/', 'inicio')->name('inicio');
Route::view('nuevos', 'nuevos')->name('nuevos');
Route::view('destacados', 'destacados')->name('destacados');*/

Route::get('/', [ PagesController::class, 'inicio' ]);
Route::get('nuevos', [ PagesController::class, 'nuevos' ]);
Route::get('destacados', [ PagesController::class, 'destacados' ]);
