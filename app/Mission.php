<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $guarded=[];
    //

    public function time()
    {
        return $this->hasMany('App\Time');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
