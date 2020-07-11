<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    function  bookings(){


        return $this->hasMany(Booking::class);
      }

}
