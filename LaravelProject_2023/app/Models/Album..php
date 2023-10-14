<?php
    namespace App\Models;

    class Album{
        public static function all(){
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
    }