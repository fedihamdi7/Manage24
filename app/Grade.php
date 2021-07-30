<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $guarded=[];

    public function collab()
    {
        return $this->hasMany('App\Collab');
    }

}
