<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
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
//All Jobs
Route::get('/', [JobController::class, 'index']);
//Show create form
Route::get('/job/create', [JobController::class, 'create']);
//Show single job
Route::get('/job/{job}', [JobController::class, 'show']);
//Store or save create form
Route::post('/job', [JobController::class,'store']);
//Show edit form
Route::get('/jobs/{job}/edit', [JobController::class,'edit']);
//Update job
Route::put('/jobs/{job}', [JobController::class, 'update']);
//Delete
Route::delete('/jobs/{jog}', [JobController::class, 'destroy']);

//Show User registration form
Route::get('/register', [UserController::class, 'create']);

//Save new user
Route::post('/users',  [UserController::class, 'store']);

//Logout

Route::post('/logout', [UserController::class, 'logout']);








/*
index - show all jobs
show - show single job
create -show form to create new job
store - store new jobs
edit - update job
update - save edit form
destroy - delete job
*/