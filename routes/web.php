<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExercisesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ExercisesController::class,'index']);


Route::post('/store/exercises',[ExercisesController::class,'store_exercises']);

Route::post('/calculate/days',[ExercisesController::class,'calculate_days']);


