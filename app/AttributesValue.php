<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributesValue extends Model
{
    public function values ()
    {
        //look into Attribute for the id which belongs to attribute_id
        return $this->hasOne('App\Attribute', 'id', 'attribute_id');
    }
}
