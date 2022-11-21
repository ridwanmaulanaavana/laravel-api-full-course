<?php

//namespace 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/posts',[PostController::class,'index'])->name('index')->withoutMiddleware('auth');
Route::post('/store',[PostController::class,'store'])->name('store')->withoutMiddleware('auth');
Route::get('/show/{post}',[PostController::class,'show'])->name('show');
Route::patch('/update/{post}',[PostController::class,'update'])->name('update');
Route::delete('/destroy/{post}',[PostController::class,'destroy'])->name('destroy');
