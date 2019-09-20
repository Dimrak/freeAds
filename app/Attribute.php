<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function relation(){
        echo "hello";
//        return $this->hasMany('App\Attribute', 'type_id','attribute_id');
    }

    public function type () {
        return $this->hasOne('App\AttributeType','id','type_id');
    }

    public function attributeSet()
    {
        return $this->hasOne('App\AttributeSet', 'id', 'attribute_set_id');
    }


}
