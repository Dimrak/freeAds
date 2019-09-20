<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSetRelationship extends Model
{
    public function attributes()
    {
        return $this->hasOne('App\Attribute','id', 'attribute_id');
    }
    public function names()
    {
//        return $this->hasOne('App\Attributes', 'id', 'attribute_id');
    }

}
