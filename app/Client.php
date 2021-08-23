<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded=[];

    public function missions()
    {
        return $this->hasMany('App\Mission');
    }
    public function time()
    {
        return $this->hasOne('App\Time');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function collab()
    {
        return $this->belongsTo('App\Collab');
    }

}
