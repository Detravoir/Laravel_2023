<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTracks extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['genre'] ?? false){
            $query->where('genres', 'like', '%' . request('genre') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('genres', 'like', '%' . request('search') . '%')
                ->orWhere('artist', 'like', '%' . request('search') . '%');
        }
    }
}