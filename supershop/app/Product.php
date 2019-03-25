<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{
    public $timestamps = false;

    private $id;
    private $name;
    private $price;

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class)->withPivot('value');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
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

    public static function sortByPrice($price){
        if(isset($price)){
            switch ($price) {
                case 'asc':
                    $essence = self::sortBy('price');
                    return $essence;
                case 'desc':
                    $essence = self::sortByDesc('price');
                    return $essence;
                default:
                    return null;
                    break;
            }
        } else {
            return null;
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
