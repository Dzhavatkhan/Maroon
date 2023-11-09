<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaroonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::middleware('guest')->group(function(){

    Route::get('/', [MaroonController::class, 'index'])->name('index');
    Route::get('product/{id}', [MaroonController::class, 'show'])->name('product');

    Route::get('/sign in account',[ UserController::class, 'signIn'])->name('signIn');
    Route::post('registration', [UserController::class, 'signUp'])->name('signUpApi');
    Route::post('/login', [UserController::class, 'login'])->name('login');
// });




    Route::get('/profile/id{id}', [UserController::class, 'index'])->name('profile');
    Route::get('/log out', [UserController::class, 'logout'])->name('logout');

    Route::patch('profile/update_user', 'App\Http\Controllers\UserController@update')->name("update_user");
    Route::get('profile/addCart', [UserController::class, 'add_cart'])->name('addCart');
    Route::get('profile/delectCart', [UserController::class, 'delete_cart'])->name('delectCart');
    Route::get('profile/getCart', [UserController::class, 'getCart'])->name('getCart');
    Route::get('catalog', [MaroonController::class,'getCatalog'])->name('catalog');
    Route::get('catalog/filter', [MaroonController::class, 'filter'])->name('filter');
    Route::get('profile/id{id}/balance',[UserController::class, 'plus_balance'])->name('plus_balance');
    Route::get('profile/id{id}/pay', [MaroonController::class,'pay'])->name('pay');
// Route::middleware('auth')->group(function(){
    //admin-panel

    // });


