<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
    	return $this->belongsToMany('App\Item')
									->withPivot('qty')
									->withTimestamps();
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }   
}
