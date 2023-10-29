<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // Relationship To User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}