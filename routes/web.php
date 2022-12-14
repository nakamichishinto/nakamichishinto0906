<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\FirstMiddleware;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/auth', [TodoController::class,'check']);
Route::post('/auth', [TodoController::class,'checkUser']);

Route::get('/logout',[TodoController::class,'logout']);


Route::get('/',[TodoController::class,'index']);

Route::get('/todo/search',[TodoController::class,'search']);


Route::post('/todo/create',[TodoController::class,'create']);


Route::post('/todo/update',[TodoController::class,'update']);


Route::post('/todo/delete', [TodoController::class, 'delete']);

