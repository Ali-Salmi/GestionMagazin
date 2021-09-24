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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/article', function () {
    return view('article');
})->name('article');

Route::middleware(['auth:sanctum', 'verified'])->get('/client', function () {
    return view('client');
})->name('client');

Route::middleware(['auth:sanctum', 'verified'])->get('/commande', function () {
    return view('commande');
})->name('commande');

Route::middleware(['auth:sanctum', 'verified'])->get('/statistique', function () {
    return view('statistique');
})->name('statistique');

Route::middleware(['auth:sanctum', 'verified'])->get('/pdrsortie', function () {
    return view('pdrsortie');
})->name('pdrsortie');

Route::middleware(['auth:sanctum', 'verified'])->get('/pdrentree', function () {
    return view('pdrentree');
})->name('pdrentree');

Route::middleware(['auth:sanctum', 'verified'])->get('/hebdo', function () {
    return view('hebdo');
})->name('hebdo');


