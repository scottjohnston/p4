<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escape extends Model
{
     public function holidays()
    {
      return $this->belongsToMany('\App\Holiday')->withTimestamps();
    }
}
