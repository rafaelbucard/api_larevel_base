<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DayController;

use App\Http\Controllers\UserController;

use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;

Route::get('/ping', function(){
    return ['pong' =>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validate',[AuthController::class,'validateToken']);
    Route::post('/auth/logout',[AuthController::class,'logout']);
    //Usuários
    Route::get('/user',[UserController::class,'getAll']);
    Route::get('/user/{id}',[UserController::class,'show']);
    Route::put('/userup/{id}',[UserController::class,'update']);
    Route::delete('/userdel/{id}',[UserController::class,'delete']);
    //

    //
    Route::get('/day',[DayController::class,'show']);
    Route::put('/day/{id}',[DayController::class,'update']);
    Route::post('/day',[DayController::class,'store']);
    Route::delete('/day/{id}',[DayController::class,'destroy']);
    //

    //
    Route::get('/delivery',[DeliveryController::class,'show']);
    Route::put('/delivery/{id}',[DeliveryController::class,'update']);
    Route::post('/delivery',[DeliveryController::class,'store']);
    Route::delete('/delivery/{id}',[DeliveryController::class,'destroy']);
    //

    /*
    Route::get('/product/{id}',[ProductController::class,'productDeposit']);
    Route::get('/product/{id}/specific/{id_profitabilify}',[ProductController::class,'getId']);
    Route::post('/product/{id}',[ProductController::class,'insert']);
    Route::delete('/product/{id}',[ProductController::class,'delete']);
    */

    //
    
});

