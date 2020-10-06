<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
