<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model{
    protected $fillable = [
        'name', 'description'
    ];

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'game_club');
    }
}
