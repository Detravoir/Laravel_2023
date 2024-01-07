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
        $user->increment('likes_given');
        
        // Update liked_by-veld in de database
        $likedBy = json_decode($this->liked_by);
        $likedBy[] = $user->id;
        $this->update(['liked_by' => json_encode($likedBy)]);
    }
}
    
}