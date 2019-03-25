<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    public static function findBySlug($slug)
    {
        $essence = self::where('slug', $slug)->first();
        if($essence){
            return $essence;
        } else {
            abort(404);
        }
    }
}
