<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $guarded=[];

    public function missions()
    {
        return $this->hasMany('App\Mission');
    }

}
