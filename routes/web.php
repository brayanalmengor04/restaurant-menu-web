<?php
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Usuario lo hare manual  
Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::resource('subcription', SubscriptionsController::class );
Route::resource('dish', DishesController::class );
Route::resource('category', CategoryController::class );

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
