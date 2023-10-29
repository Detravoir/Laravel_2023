<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteTracks;

class TrackController extends Controller
{
    // Show all tracks
    public function index(){
        return view('tracks.index', [
            'tracks' => FavoriteTracks::latest()->filter(request(['genre', 'search']))->paginate(6)
        ]);
    }

    // Show single track
    public function show(FavoriteTracks $track){

        return view('tracks.show', [
            'track' => $track
        ]);
    }

    // Show Create Form
    public function create(){
        return view('tracks.create');
    }


    // Store Track Data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'genres' => 'required',
            'artist' => 'required',
            'album' => '',
            'description' => '',
            'link' => ['required', 'URL']
        ]);

        FavoriteTracks::create($formFields);

        return redirect('/')->with('messege', 'Track has been added!');
    }

    // Show Edit Form
    public function edit(FavoriteTracks $track){
        return view('tracks.edit', ['track' => $track]);
    }

    public function update(Request $request, FavoriteTracks $track){
        $formFields = $request->validate([
            'title' => 'required',
            'genres' => 'required',
            'artist' => 'required',
            'album' => '',
            'description' => '',
            'link' => ['required', 'URL']
        ]);

        $track->update($formFields);

        return back()->with('messege', 'Track has been updated!');
    }

    // Delete Track
    public function destroy(FavoriteTracks $track){
        $track->delete();
        return redirect('/')->with('message', 'Track has been deleted');
    }
}
