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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home-index');
Route::get('/view/{id}',[App\Http\Controllers\HomeController::class, 'view']);
Route::get('/edit/{id}',[App\Http\Controllers\HomeController::class, 'edit']);
Route::post('/update',[App\Http\Controllers\HomeController::class, 'update']);
Route::get('/edit-profile',[App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/update-profile',[App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile-update');
Route::get('/delete/{id}',[App\Http\Controllers\HomeController::class, 'delete']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::post('/exit', [App\Http\Controllers\UrlController::class, 'index']);
Route::get('/242', [App\Http\Controllers\UrlController::class, 'direct_to_org_link'])->name('direct_to_org_link');
Route::get('/{first}/{last}',[App\Http\Controllers\UrlController::class, 'direct_to_temp'])->name('midroute');

Route::post('/contact', [EmailController::class, 'notify'])->name('contact');




Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard/view/list', [App\Http\Controllers\HomeController::class, 'admin'])->name('dashboard');
});
