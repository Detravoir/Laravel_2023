<?php

use Illuminate\Http\Request;
use App\Models\FavoriteTracks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrackController;

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


// All tracks
Route::get('/', [TrackController::class, 'index']);

// Show Create Form
Route::get('/tracks/create', [TrackController::class, 'create'])->middleware('auth');

// Store Track Data
Route::post('/tracks', [TrackController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->middleware('auth');

// Update Track
Route::put('/tracks/{track}', [TrackController::class, 'update'])->middleware('auth');

// Delete Track
Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->middleware('auth');

// Singel Track
Route::get('/track/{track}', [TrackController::class, 'show']);

// Manage Tracks
Route::get('/tracks/manage', [TrackController::class, 'manage'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

