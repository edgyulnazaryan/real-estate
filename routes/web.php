<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
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

Route::get('/', function () 
{
    return view('welcome');
})->name('home');

Route::get('/create', [ApartmentController::class, 'create'])->name('create');

Route::post('/create', [ApartmentController::class, 'store'])->name('create-submit');

Route::get('/show', [ApartmentController::class, 'show'])->name('show');

Route::get('/show/{id}', [ApartmentController::class, 'details'])->name('apartment-detail');

Route::get('/search', [ApartmentController::class, 'search'])->name('search');

