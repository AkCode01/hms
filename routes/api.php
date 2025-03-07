<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\DoctorController;
// use App\Models\Post;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('users',[AuthController::class,'getAllUsers']);
    Route::post('logout',[AuthController::class,'logout']);
  
    Route::apiResource('posts', PostController::class);
  
    Route::get('/GetHospitals', [HospitalController::class, 'index']); 
    Route::post('/AddHospital', [HospitalController::class, 'store']); 
    Route::get('/GetHospitalById/{id}', [HospitalController::class, 'show']); 
    Route::put('/UpdHospitalById/{id}', [HospitalController::class, 'update']); 
    Route::delete('/DelHospitalById/{id}', [HospitalController::class, 'destroy']); 

    Route::get('/GetDoctors', [DoctorController::class, 'index']); 
    Route::post('/AddDoctor', [DoctorController::class, 'store']); 
    Route::get('/GetDoctorById/{id}', [DoctorController::class, 'show']); 
    Route::put('/UpdDoctorById/{id}', [DoctorController::class, 'update']); 
    Route::delete('/DelDoctorById/{id}', [DoctorController::class, 'destroy']); 
});
