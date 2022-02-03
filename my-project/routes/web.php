<?php

use App\Http\Controllers\PagesController;
use GuzzleHttp\Middleware;
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

Route::get('/', [ PagesController::class, 'inicio'])->name('inicio');
Route::get('nuevos', [ PagesController::class, 'nuevos' ])->name('nuevos');
Route::get('destacados', [ PagesController::class, 'destacados' ])->name('destacados');
Route::get('creaChollo', [ PagesController::class, 'creaChollo' ])->name('creaChollo');
Route::post('chollos', [ PagesController::class, 'crear' ]) -> name('chollos.crear');

Route::get('login', [ PagesController::class, 'login'])->name('login');
//Route::get('editaChollo/{id}', [ PagesController::class, 'editar' ]) -> name('editaChollo')->middleware('auth');
Route::middleware('auth')->get('editaChollo/{id}', [ PagesController::class, 'editar' ]) -> name('editaChollo');
Route::put('editaChollo/{id}', [ PagesController::class, 'actualizar' ]) -> name('actualizarChollo');

Route::delete('eliminarChollo/{id}', [ PagesController::class, 'eliminar' ]) -> name('eliminarChollo');

Route::get('vistaChollo/{id}', [ PagesController::class, 'vistaChollo' ])->name('vistaChollo');

//Route::get('/', [ PagesController::class, 'chollos' ]);
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
