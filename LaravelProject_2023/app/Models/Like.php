<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'favorite_track_id'];

    public function track()
    {
        return $this->belongsTo(FavoriteTracks::class, 'favorite_track_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
