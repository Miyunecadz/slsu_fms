<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/newfolder', [DashboardController::class, 'newFolder'])->name('newFolder');
Route::post('/newfolder', [DashboardController::class, 'createFolder'])->name('create.folder');
Route::get('/uploadFile', [DashboardController::class, 'uploadFile'])->name('upload.file');
Route::post('/uploadFile', [DashboardController::class, 'upload']);
