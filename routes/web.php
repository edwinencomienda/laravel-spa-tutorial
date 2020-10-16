<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', function () {
        Auth::logout();
        return redirect(route('login'));
    });
    
    Route::group(['prefix' => 'web-api'], function () {
        Route::get('items', [\App\Http\Controllers\ItemController::class, 'index']);
        Route::get('items/{item}', [\App\Http\Controllers\ItemController::class, 'show']);
        Route::post('items', [\App\Http\Controllers\ItemController::class, 'store']);
        Route::put('items/{item}', [\App\Http\Controllers\ItemController::class, 'update']);
        Route::delete('items/{item}', [\App\Http\Controllers\ItemController::class, 'delete']);
    });
    
    Route::get('/{any}', [\App\Http\Controllers\SpaController::class, 'index'])
        ->where('any', '.*');
});