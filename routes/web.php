<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('_template_back.layout');
// });

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/auth',[LoginController::class, 'auth'])->name('auth');

//ROUTE BARU
Route::resource('buku', BukuController::class);
