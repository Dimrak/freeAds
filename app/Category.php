<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function subCategories(){
      return $this->hasMany('App\Category', 'parent_id','id');
   }
   public function getRouteKeyName()
   {
      return 'slug';
   }
   public function scopeActive($query){
      return $query->where('active', 1);
   }
   public function scopeParents($query)
   {
        return $query->where('parent_id', 0);
   }

   public function advertsTablet(){
      //foreignKey - de donde sacaremos el relate
      //localkey - de la tabla actual cual es el mismo que foreginKey
      return $this->hasMany('App\Advert', 'cat_id', 'id')->take(3);
   }
   public function advertsDesktop(){
      //foreignKey - de donde sacaremos el relate
      //localkey - de la tabla actual cual es el mismo que foreginKey
      return $this->hasMany('App\Advert', 'cat_id', 'id')->take(2);
   }
   public function advertsCat(){
      //foreignKey - de donde sacaremos el relate
      //localkey - de la tabla actual cual es el mismo que foreginKey
      return $this->hasMany('App\Advert', 'cat_id', 'id')->take(3);
   }
}
