<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\FaqController;

use App\Http\Controllers\Controller;
use App\Models\Post;

Route::get('/service', [ServiceController::class, 'index']);
Route::get('/servicedetail/{id}', [ServiceController::class, 'serviceDetail']);
Route::get('/', [Controller::class, 'index']);
Route::post('/reservasi', [Controller::class, 'addReservasi']);

// ✅ Revisi routing katalog view
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
