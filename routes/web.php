<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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

Route::controller(BlogController::class)->group(function () {
    // Route::get('/', 'index');
    Route::get('/', 'index')->name('home');
    Route::get('/createpost', 'createP')->name('createpost');
    Route::get('/allposts', 'allP')->name('allposts');
    Route::post('/postblog', 'postB');
    Route::get('/viewpost/{id}', 'viewpost');
    Route::get('/changepost/{id}', 'changeP');
    Route::post('/updatepost', 'updateP');
    Route::get('/login', 'loginP')->name('login');
    Route::post('/login', 'postL');
    Route::get('/register', 'registerP')->name('register');
    Route::post('/register', 'postR');
    Route::get('/logout', 'logout')->name('logout');


});
