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

// Singel Track
Route::get('/track/{track}', [TrackController::class, 'show']);
