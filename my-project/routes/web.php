<?php

use App\Http\Controllers\PagesController;
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

Route::get('/', [ PagesController::class, 'inicio' ])->name('inicio');
Route::get('nuevos', [ PagesController::class, 'nuevos' ])->name('nuevos');
Route::get('destacados', [ PagesController::class, 'destacados' ])->name('destacados');
Route::get('creaChollo', [ PagesController::class, 'creaChollo' ])->name('creaChollo');
Route::get('editaChollo', [ PagesController::class, 'editaChollo' ])->name('editaChollo');
Route::post('chollos', [ PagesController::class, 'crear' ]) -> name('chollos.crear');
Route::post('editar/{id}', [ PagesController::class, 'editar' ]) -> name('chollos.editar');
Route::put('editar/{id}', [ PagesController::class, 'actualizar' ]) -> name('chollos.actualizar');
Route::get('inicio', [ PagesController::class, 'chollos' ]);