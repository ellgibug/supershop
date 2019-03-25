<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    public static function findBySlug($slug)
    {
        $essence = self::where('slug', $slug)->first();
        if($essence){
            return $essence;
        } else {
            abort(404);
        }
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
