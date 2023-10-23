<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTracks extends Model
{
    use HasFactory;

    public static function alltracks(){

        return [
            [
                'id' => 1,
                'title' => 'Orakel',
                'description' => 'dit albumpje is tof'
            ],
            [
                'id' => 2,
                'title' => 'ISM',
                'description' => 'deze ook wel'
            ]
        ];
    }
    public static function find($id){
        $tracks = self::alltracks();

        foreach($tracks as $track){
            if($track['id'] == $id){
                return $track;
            }
        }
    }
}
