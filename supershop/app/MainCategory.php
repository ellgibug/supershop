<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use http\Env\Response;

class MainCategory extends Model
{
    public $timestamps = false;

    public function categories()
    {
        return $this->hasMany(Category::class);
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
