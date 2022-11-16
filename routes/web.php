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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/aves', function () {
    return view('aves');
})->middleware(['auth', 'verified'])->name('aves');

Route::get('/ordenes', function () {
    return view('ordenes');
})->middleware(['auth', 'verified'])->name('ordenes');

Route::get('/familias', function () {
    return view('familias');
})->middleware(['auth', 'verified'])->name('familias');

Route::get('/habitas', function () {
    return view('habitas');
})->middleware(['auth', 'verified'])->name('habitas');

Route::get('/nueva_ave', function () {
    return view('nueva_ave');
})->middleware(['auth', 'verified'])->name('nueva_ave');

Route::get('/nueva-ave', function () {
    return view('AvesNueva');
})->middleware(['auth', 'verified'])->name('img_ave');

Route::get('/nueva-ave', function () {
    return view('imagenueva');
})->middleware(['auth', 'verified'])->name('imagenueva');

Route::get('/img_ave', function () {
    return view('img_ave');
})->middleware(['auth', 'verified'])->name('img_ave');

require __DIR__.'/auth.php';
