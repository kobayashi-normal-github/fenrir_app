<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DetailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [SearchController::class,'index'])->name('search');
// Route::post('/result/{page?}', [ResultController::class,'index'])->name('result');
Route::get('/result', [ResultController::class,'index'])->name('result');
Route::get('/{id}/detail', [DetailController::class,'index'])->name('detail');
