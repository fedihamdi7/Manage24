<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    //
    protected $guarded=['collab_pwd'];

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
}
