<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    public function holiday()
    {

      return $this->belongsTo('App\User');
    }

    public function escapes()
    {
      return $this->belongsToMany('\App\Escape')->withTimestamps();
    }
}
