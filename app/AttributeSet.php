<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    //Falta juntar con attributes
    public function relations()
    {
        return $this->hasMany('App\AttributeSetRelationship', 'attribute_set_id','id');
    }

}
