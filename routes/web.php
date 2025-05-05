<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\FaqController;

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
Route::get('/katalogview', [KatalogController::class, 'index']);
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

