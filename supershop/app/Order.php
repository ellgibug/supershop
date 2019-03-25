<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty');
    }
}
