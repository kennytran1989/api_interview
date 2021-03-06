<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ExportCSVController;
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

Route::get('download-csv', [ExportCSVController::class, 'exportCSVAndStorage'])->name('download-csv');
