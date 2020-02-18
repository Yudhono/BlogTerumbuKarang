<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function daerah() {
      return $this->belongsTo('App\Daerah');
    }

    public function comments() {
      return $this->hasMany('App\Comment');
    }
}
