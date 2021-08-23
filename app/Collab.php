<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    //


    public function time()
    {
        return $this->hasOne('App\Time');
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
