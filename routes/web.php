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
Route::get('/job/create', [JobController::class, 'create'])->middleware('auth');
//Show single job
Route::get('/job/{job}', [JobController::class, 'show']);
//Store or save create form
Route::post('/job', [JobController::class,'store'])->middleware('auth');
//Show edit form
Route::get('/jobs/{job}/edit', [JobController::class,'edit'])->middleware('auth');
//Update job
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
//Delete
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

//Show User registration form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Save new user
Route::post('/users',  [UserController::class, 'store'])->middleware('guest');

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Authenticate login form
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

//Manage Job Post
Route::get('/jobs/manage', [JobController::class, 'manage'])->middleware('auth');




/*
index - show all jobs
show - show single job
create -show form to create new job
store - store new jobs
edit - update job
update - save edit form
destroy - delete job
*/