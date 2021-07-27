<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $guarded=[];
    //

    public function time()
    {
        return $this->belongsTo('App\Time');
    }
}
