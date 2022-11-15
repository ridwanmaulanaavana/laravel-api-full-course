<?php

//namespace 
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth')
// ->prefix('heyaa')
// ->group(function(){
//     Route::get('/users',[UserController::class,'index'])->name('users.index');
//     Route::get('/users/{user}',[UserController::class,'show'])->name('users.index');
//     Route::post('/users',[UserController::class,'store'])->name('users.index');
//     Route::patch('/users/{user}',[UserController::class,'update'])->name('users.index');
//     Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.index');    
// });


Route::middleware('auth')
//->prefix('heyaa')
->name('users.')
->group(function(){
    Route::get('/users',[UserController::class,'index'])->name('index')->withoutMiddleware('auth');
    Route::get('/users/{user}',[UserController::class,'show'])->name('show')->withoutMiddleware('auth')->where('user','[0-9]+');
    Route::post('/users',[UserController::class,'store'])->name('store');
    Route::patch('/users/{user}',[UserController::class,'update'])->name('update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('destroy');    
});

