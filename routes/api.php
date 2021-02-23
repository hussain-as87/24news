<?php

use App\Http\Controllers\ApiClassificationController;
use App\Http\Controllers\ApiNewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//news routes

//index
Route::get('news/home', [ApiNewsController::class, 'index'])->name('news.home');

//show
Route::get('news/{id}', [ApiNewsController::class, 'show'])->name('news.show');

//create
Route::post('news', [ApiNewsController::class, 'store'])->name('news.store');

//edit
Route::put('news', [ApiNewsController::class, 'store'])->name('news.update');

//delete
Route::delete('news/{id}', [ApiNewsController::class, 'destroy'])->name('news.destroy');


//classification routes

//index
Route::get('class/home', [ApiClassificationController::class, 'index'])->name('class.home');

//show
Route::get('class/{id}', [ApiClassificationController::class, 'show'])->name('class.show');

//create
Route::post('class', [ApiClassificationController::class, 'store'])->name('class.store');

//edit
Route::put('class', [ApiClassificationController::class, 'store'])->name('class.update');

//delete
Route::delete('class/{id}', [ApiClassificationController::class, 'destroy'])->name('class.destroy');
