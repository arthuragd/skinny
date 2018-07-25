<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user(){
    	return $this->belongsTo('App\User', 'users_id');
    }

    public function bills(){
        return $this->hasMany('App\Bill');
    }
}
