<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

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
    
    public function likedByUsers()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->where('likes_given', '>', 0);
    }

    public function addLike()
    {
        $user = auth()->user();

        if ($user && !$user->hasLikedTrack($this)) {
            $likedBy = json_decode($this->liked_by, true) ?? [];

            // Controleer of de gebruiker al in de lijst staat
            if (!in_array($user->id, $likedBy)) {
                $likedBy[] = $user->id;
                $this->update(['liked_by' => json_encode($likedBy)]);
                
                // JavaScript console log
                echo '<script>console.log("addLike called for track ID ' . $this->id . '")</script>';
                
                // Verhoog likes_given van de gebruiker
                $user->increment('likes_given');
            }
        }
    }

    
}