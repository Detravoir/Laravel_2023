<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteTracks;
use App\Models\User;

class TrackController extends Controller
{
    // Show all tracks
    public function index(){
        $genres = FavoriteTracks::distinct('genres')->pluck('genres')->flatMap(function($genre) {
            return explode(',', $genre);
        })->unique()->values();
    
        return view('tracks.index', [
            'tracks' => FavoriteTracks::latest()->filter(request(['genre', 'search']))->paginate(6),
            'genres' => $genres,
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
        // Controleer of de gebruiker minimaal 5 likes heeft gegeven
        $userLikesCount = auth()->user()->likes_given;
        if ($userLikesCount < 5) {
            return redirect('/')->with('messege', 'Je moet minimaal 5 likes geven voordat je een track kunt toevoegen.');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'genres' => 'required',
            'artist' => 'required',
            'album' => '',
            'description' => '',
            'link' => ['required', 'URL']
        ]);


        $formFields['user_id'] = auth()->id();

        FavoriteTracks::create($formFields);

        return redirect('/')->with('messege', 'Track has been added!');
    }

    // Show Edit Form
    public function edit(FavoriteTracks $track){
        return view('tracks.edit', ['track' => $track]);
    }

    public function update(Request $request, FavoriteTracks $track){

        // Make sure logged in user is owner
        if ($track->user_id != auth()->id() && !auth()->user()->is_admin){
            abort(403, 'Unautherized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'genres' => 'required',
            'artist' => 'required',
            'album' => '',
            'description' => '',
            'is_active' => '',
            'link' => ['required', 'URL']
        ]);

        $track->update($formFields);

        return back()->with('messege', 'Track has been updated!');
    }

    // Delete Track
    public function destroy(FavoriteTracks $track){
        // Make sure logged in user is owner
        if ($track->user_id != auth()->id() && !auth()->user()->is_admin){
            abort(403, 'Unautherized Action');
        }

        $track->delete();
        return redirect('/')->with('message', 'Track has been deleted');
    }

    // Manage Track
    public function manage(){
        return view('tracks.manage', ['tracks' => auth()->user()->tracks()->get()]);
    }

    public function deactivate(Request $request, FavoriteTracks $track){
        // Zorg ervoor dat de huidige gebruiker eigenaar is van de track of een admin is voordat je deze deactiveert
        if ($track->user_id == auth()->id() || auth()->user()->is_admin) {
            $this->toggleActiveStatus($track, 0);
            return back()->with('message', 'Track has been deactivated!');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }
    
    public function activate(Request $request, FavoriteTracks $track){
        // Zorg ervoor dat de huidige gebruiker eigenaar is van de track of een admin is voordat je deze activeert
        if ($track->user_id == auth()->id() || auth()->user()->is_admin) {
            $this->toggleActiveStatus($track, 1);
            return back()->with('message', 'Track has been activated!');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }
    
    protected function toggleActiveStatus(FavoriteTracks $track, $status){
        // dd($status);
        $track->update(['is_active' => $status]);
    }

    public function addLike(FavoriteTracks $track)
    {
        // Controleer of de gebruiker de track al heeft geliket
        $user = auth()->user();

        if (!$user->likedTracks->contains($track->id)) {
            // Voeg like toe
            $track->addLike();

            // Verhoog likes_given van de gebruiker
            $user->increment('likes_given');

            return back()->with('success', 'Like toegevoegd!');
        } else {
            return back()->with('error', 'Je hebt deze track al geliket!');
        }
    }
    public function adminManage() {
        $tracks = FavoriteTracks::latest()->paginate(10);
        return view('tracks.admin_manage', compact('tracks'));
    }
}
