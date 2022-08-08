<?php

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
Route::get('todo-apps/pdf', [App\Http\Controllers\TodoAppController::class, 'pdf'])->name('todo-apps.pdf');



Route::resource('todo-apps', 'App\Http\Controllers\TodoAppController')->names('todo-apps');




