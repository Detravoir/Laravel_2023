<?php

use Illuminate\Http\Request;
use App\Models\FavoriteTracks;
use Illuminate\Support\Facades\Route;
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
Route::get('/tracks/create', [TrackController::class, 'create']);

// Store Track Data
Route::post('/tracks', [TrackController::class, 'store']);

// Show Edit Form
Route::get('/tracks/{track}/edit', [TrackController::class, 'edit']);

// Update Track
Route::put('/tracks/{track}', [TrackController::class, 'update']);

// Delete Track
Route::delete('/tracks/{track}', [TrackController::class, 'destroy']);

// Singel Track
Route::get('/track/{track}', [TrackController::class, 'show']);