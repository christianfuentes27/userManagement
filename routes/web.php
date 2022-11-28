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

Auth::routes(['verify' => true, 'register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//middleware: clase o el nombre
Route::get('guest', [App\Http\Controllers\SampleRouteController::class, 'guest'])->name('guest')->middleware('guest');
Route::get('logged', [App\Http\Controllers\SampleRouteController::class, 'logged'])->name('logged')->middleware('auth');
Route::get('verified', [App\Http\Controllers\SampleRouteController::class, 'verified'])->name('verified')->middleware('verified');

Route::get('public', [App\Http\Controllers\SampleRouteController::class, 'public'])->name('public');
Route::get('sensitive', [App\Http\Controllers\SampleRouteController::class, 'sensitive'])->name('sensitive')->middleware('password.confirm'); //??????

Route::get('ruta1', [App\Http\Controllers\MiddlewareController::class, 'ruta1']);
Route::get('ruta2', [App\Http\Controllers\MiddlewareController::class, 'ruta2']);
Route::get('ruta3', [App\Http\Controllers\MiddlewareController::class, 'ruta3']);

Route::resource('admin', App\Http\Controllers\AdministrationController::class);

Route::get('home/edit', App\Http\Controllers\AdministrationController::class);
Route::put('home/update', App\Http\Controllers\AdministrationController::class);