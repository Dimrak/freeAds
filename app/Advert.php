<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Advert extends Model
{
    use Searchable;
   public function getRouteKeyName()
   {
      return 'slug';
   }
//   public function updateCounter()
//   {
//      $this->advert->counter = 1;
//      $this->advert->save();
//   }
   public function getComment()
   {
      return $this->hasOne('App\Comment','advert_id', 'id');
   }
   public function cityName()
   {
      return $this->hasOne('App\City','id','city_id');
   }
   public function comments()
   {
      return $this->hasMany('App\Comment', 'advert_id', 'id');

   }
   public function categoryName()
   {
      return $this->hasOne('App\Category', 'id', 'cat_id');
   }
   public function category()
   {
        return $this->hasOne('App\Advert', 'id', 'cat_id');
   }
   public function scopeActive($query){
        return $query->where('active', 1);
   }
   public function scopeParents($query)
   {
      return $query->where('parent_id', 0);
   }

   //New today 09.09
   public function attributeSet()
   {
       //Here we say to find for those two
        return $this->hasOne('App\AttributeSet', 'id', 'attribute_set_id');
   }

   public function findAuthor()
   {
       return $this->hasOne('App\User', 'id', 'user_id');
   }

   public function findValues()
   {
        return $this->hasMany('App\AttributesValue', 'advert_id', 'id');
   }

//   public function
//   public function category()
//   {
//      return $this->hasOne('App\Category', 'id', 'cat_id');
//   }

}
