<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model{
    protected $fillable = [
        'name', 'description'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_club');
    }
}
