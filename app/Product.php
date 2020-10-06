<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    function relationtocategorytable()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
