<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}