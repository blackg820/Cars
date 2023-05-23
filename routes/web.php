<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\citiescontroller;
use App\Http\Controllers\collegecontroller;
use App\Http\Controllers\addressescontroller;
use App\Http\Controllers\welcomecontroller;

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


Route::get('/', [App\Http\Controllers\welcomecontroller::class, 'index'])->name('welcome');
Route::post('/', [App\Http\Controllers\welcomecontroller::class, 'show'])->name('welcome.show');

Auth::routes();

Route::resource('profile', profilecontroller::class)->only("index","update","show");

Route::resource('location', locationcontroller::class)->only("index","update");

Route::resource('user', usercontroller::class)->only("index","update","destroy","show");

Route::post('city/create', [citiescontroller::class, 'create'])->name('location.create');

Route::post('college/create', [collegecontroller::class, 'create'])->name('college.create');

Route::post('address/create', [addressescontroller::class, 'create'])->name('address.create');

Route::put('/user/{id}/edit', [usercontroller::class, 'edit'])->name('user.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
