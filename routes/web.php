<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('/welcome');
});
Auth::routes();
// Auth::routes(['verify' => true]);
Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('optimize');
   Artisan::call('route:cache');
   Artisan::call('route:clear');
   Artisan::call('view:cache');
   Artisan::call('view:clear');
   Artisan::call('event:cache');
   Artisan::call('event:clear');
   //Artisan::call('config:cache');

   return "Cache Cleared!";

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


