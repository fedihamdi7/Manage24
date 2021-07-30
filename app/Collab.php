<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    //
    protected $guarded=[];

    public function time()
    {
        return $this->hasOne('App\Time');
    }
}
