<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KonsultasiController;

use App\Http\Controllers\Controller;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/service', [ServiceController::class, 'index']);
Route::get('/servicedetail/{id}', [ServiceController::class, 'serviceDetail']);
Route::get('/', [Controller::class, 'index']);
Route::post('/reservasi', [Controller::class, 'addReservasi']);

Route::get('/katalogview', [KatalogController::class, 'index']); // tetap route lama
Route::get('/katalog', [KatalogController::class, 'katalogIndex']); // route baru untuk filter

Route::get('/katalogdetail/{id}', [KatalogController::class, 'katalogDetail']);
Route::post('/katalogdetail/diskusi/{id}', [KatalogController::class, 'katalogDiskusi']);
Route::get('/katalogdetail/delete/{id}', [KatalogController::class, 'deleteDiskusi']);

Route::get('/article', [ArticleController::class, 'index']);
Route::get('/articledetail/{id}', [ArticleController::class, 'articleDetail']);
Route::get('/articledetail/suka/{id}', [ArticleController::class, 'articleSuka']);
Route::post('/articledetail/komentar/{id}', [ArticleController::class, 'articleKomentar']);
route::get('/status', [Controller::class, 'status']);

Route::get('/lowongan', [LowonganController::class, 'index']);
Route::get('/lowongandetail/{id}', [LowonganController::class, 'lowongandetail']);

Route::get('/konsultasi', [KonsultasiController::class, 'index']);
Route::get('/konsultasi/login', [KonsultasiController::class, 'showLoginForm'])->name('konsultasi.login');
Route::post('/konsultasi/login', [KonsultasiController::class, 'login']);
Route::get('/konsultasi/register', [KonsultasiController::class, 'showRegisterForm'])->name('konsultasi.register');
Route::post('/konsultasi/register', [KonsultasiController::class, 'register']);
Route::post('/konsultasi/logout', [KonsultasiController::class, 'logout'])->name('konsultasi.logout');
Route::get('/konsultasi/dashboard', [KonsultasiController::class, 'dashboard'])->middleware('konsultasi.auth')->name('konsultasi.dashboard');
Route::post('/konsultasi/submit', [KonsultasiController::class, 'store'])->middleware('konsultasi.auth')->name('konsultasi.submit');

