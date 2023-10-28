<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteTracks;

class TrackController extends Controller
{
    // Show all tracks
    public function index(){
        return view('tracks.index', [
            'tracks' => FavoriteTracks::latest()->filter(request(['genre', 'search']))->get()
        ]);
    }

    // Show single track
    public function show(FavoriteTracks $track){

        return view('tracks.show', [
            'track' => $track
        ]);
    }
}
