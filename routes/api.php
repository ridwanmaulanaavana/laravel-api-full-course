<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
->group(function(){
    require __DIR__.'/api/v1/users.php';
});


//require __DIR__.'/api/v1/users.php';
//Route::resource('users',User::class);
// Route::apiResource('users',User::class);
// Route::get('/users',[UserController::class,'index']);
// Route::get('/users/{user}',[UserController::class,'show']);
// Route::post('/users',[UserController::class,'store']);
// Route::patch('/users/{user}',[UserController::class,'update']);
// Route::delete('/users/{user}',[UserController::class,'destroy']);



// Route::get('/users',function(Request $request){
//     //dump($request);
//     return new JsonResponse([
//         'data' => 'aaa'
//     ]);
// });

// //ini adalah contoh implicit binding
// Route::get('/users/{user}',function(User $user){
//     return new JsonResponse([
//         'data' => $user
//     ]);
// });

// Route::post('/users',function(){
//     return new JsonResponse([
//         'data' => "post"
//     ]);
// });

// Route::patch('/users/{user}',function(User $user){
//     return new JsonResponse([
//         'data' => "patch"
//     ]);
// });


// Route::delete('/users/{user}',function(User $user){
//     return new JsonResponse([
//         'data' => "deleted"
//     ]);
// });




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
