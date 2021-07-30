<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded=[];

    public function missions()
    {
        return $this->belongsTo('App\Mission');
    }
}
