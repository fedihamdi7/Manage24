<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded=[];
    public function missions()
    {
        return $this->hasOne('App\Mission');
    }
}
