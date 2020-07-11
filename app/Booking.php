<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //


    function  room(){


        return $this->belongsTo(Room::class);
      }

      
    function  customer(){


        return $this->belongsTo(Customer::class);
      }


    
}
