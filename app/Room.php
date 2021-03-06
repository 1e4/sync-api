<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function groups()
    {
        return $this->hasMany(RoomGroup::class);
    }

    public function members()
    {
        return $this->hasMany(RoomMember::class);
    }
}
