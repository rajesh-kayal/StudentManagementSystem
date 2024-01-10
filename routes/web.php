<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/',[StudentController::class,'index']);
Route::post('/insert', [StudentController::class, 'insert']);
Route::get('/users', [StudentController::class, 'getAll']);
Route::get('/edit/{id}', [StudentController::class, 'edit']);
Route::post('/update', [StudentController::class, 'update']);
Route::get('/delete/{id}', [StudentController::class, 'delete']);

Route::get('/signin', [StudentController::class, 'signin']);
Route::post('/login', [StudentController::class, 'login']);
Route::get('/logout', [StudentController::class, 'logout']);