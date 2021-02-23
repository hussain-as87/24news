<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NewsController;
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


/*Route::get('/', function () {
    return redirect()->route('home-locale', app()->getLocale());
})->name('home');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('/', [NewsController::class, 'index'])->name('home-locale');
});*/
Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');


Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::get('/', [NewsController::class, 'index'])->name('home');
    Route::get('/blog', [NewsController::class, 'blog'])->name('blog');
    Route::get('/blog-{class}', [NewsController::class, 'blog_show'])->name('blog.show');
    Route::get('/single-{slug}', [NewsController::class, 'single'])->name('single');
    Route::get('/search', [NewsController::class, 'search'])->name('search');


    /*contact routes*/
    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/show', [ContactController::class, 'show'])->name('contact.show')->middleware('auth');
//Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit')->middleware('auth');
//Route::patch('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update')->middleware('auth');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware('auth');

    /*control route*/
    /*classifications route*/
    Route::get('/class/create', [ClassificationController::class, 'create'])->name('class.create')->middleware('auth');
    Route::post('/class', [ClassificationController::class, 'store'])->name('class.store')->middleware('auth');
    Route::get('/class/show', [ClassificationController::class, 'show'])->name('class.show')->middleware('auth');
    Route::get('/class/{classification}/edit', [ClassificationController::class, 'edit'])->name('class.edit')->middleware('auth');
    Route::patch('/class/{classification}', [ClassificationController::class, 'update'])->name('class.update')->middleware('auth');
    Route::delete('/class/{classification}', [ClassificationController::class, 'destroy'])->name('class.destroy')->middleware('auth');

    /*news route*/
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create')->middleware('auth');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store')->middleware('auth');
    Route::get('/news/show', [NewsController::class, 'show'])->name('news.show')->middleware('auth');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit')->middleware('auth');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update')->middleware('auth');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy')->middleware('auth');
    Route::get('/news/search', [NewsController::class, 'search_from_control'])->name('news.search')->middleware('auth');
    Route::get('/news/{slug}', [NewsController::class, 'details'])->name('news.details')->middleware('auth');

});
