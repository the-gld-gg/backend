<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubUser extends Model
{

    protected $table = 'club_user';

    protected $fillable = [
        'user_id', 'club_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
