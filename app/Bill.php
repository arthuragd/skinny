<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function service(){
    	return $this->belongsTo('App\Service', 'services_id');
    }

  
}
