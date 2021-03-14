<?php

use App\Http\Controllers\api\ClassificationController;
use App\Http\Controllers\api\NewsController;
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
Route::apiResource('/news', NewsController::class)->names([
    'index' => 'api.news.index',
    'show' => 'api.news.show',
    'store' => 'api.news.store',
    'update' => 'api.news.update',
    'destroy' => 'api.news.destroy',
])->except('create', 'edit');


Route::apiResource('/classifications', ClassificationController::class)->names([
    'index' => 'api.classifications.index',
    'show' => 'api.classifications.show',
    'store' => 'api.classifications.store',
    'update' => 'api.classifications.update',
    'destroy' => 'api.classifications.destroy',
])->except('create', 'edit');

Route::post('/login', [\App\Http\Controllers\api\LoginController::class, 'login'])->name('api.login');

