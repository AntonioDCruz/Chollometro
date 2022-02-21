<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [ PagesController::class, 'inicio'])->name('inicio');
Route::get('nuevos', [ PagesController::class, 'nuevos' ])->name('nuevos');
Route::get('destacados', [ PagesController::class, 'destacados' ])->name('destacados');
Route::get('creaChollo', [ HomeController::class, 'creaChollo' ])->name('creaChollo');
Route::post('chollos', [ HomeController::class, 'crear' ]) -> name('chollos.crear');


//Route::get('editaChollo/{id}', [ PagesController::class, 'editar' ]) -> name('editaChollo')->middleware('auth');
Route::get('editaChollo/{id}', [ HomeController::class, 'editar' ]) -> name('editaChollo');
Route::put('editaChollo/{id}', [ HomeController::class, 'actualizar' ]) -> name('actualizarChollo');

Route::delete('eliminarChollo/{id}', [ HomeController::class, 'eliminar' ]) -> name('eliminarChollo');

Route::get('vistaChollo/{id}', [ PagesController::class, 'vistaChollo' ])->name('vistaChollo');

//Route::get('/', [ PagesController::class, 'chollos' ]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/creaApi', [ PagesController::class, 'creaChollo' ])->name('creaApi');
Route::post('api', [ PagesController::class, 'crearApi' ]) -> name('api.crear');
