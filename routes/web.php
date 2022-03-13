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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authorizeTeacher'])->name('authorize.teacher');
Route::get('/logout', [LoginController::class, 'logoutTeacher'])->name('logout.teacher')->middleware('teacher');


Route::controller(DashboardController::class)
        ->group(function () {
            Route::middleware(['teacher'])->group(function () {
                Route::get('/newfolder', 'newFolder')->name('newFolder');
                Route::post('/newfolder', 'createFolder')->name('create.folder');
                Route::get('/delete', 'delete');
                Route::post('/update', 'update');
            });

            Route::get('/uploadFile',  'uploadFile')->name('upload.file');
            Route::post('/uploadFile', 'upload')->name('upload-file');
        });

