<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $guarded=[];

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }

    public function collab()
    {
        return $this->belongsTo('App\Collab');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
