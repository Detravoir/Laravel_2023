<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tracks = FavoriteTracks::latest()->paginate(10);
        return view('tracks.admin_manage', compact('tracks'));
    }
}
