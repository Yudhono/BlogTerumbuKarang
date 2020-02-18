<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{

    protected $table = 'daerahs';

    public function projects() {
      return $this->hasMany('App\Project');
    }
}
