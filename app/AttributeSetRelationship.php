<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSetRelationship extends Model
{
    public function attributes()
    {
        return $this->hasOne('App\Attribute','id', 'attribute_id');
    }
    public function family($id)
    {
       return $this->where('attribute_set_id', $id);
    }
    public function names()
    {
//        return $this->hasOne('App\Attributes', 'id', 'attribute_id');
    }

}
