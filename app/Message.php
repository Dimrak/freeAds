<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    //para escribir menos logica en el controller
    public function scopeUnread($query)
    {
        return $query->where('status', 1);
    }
    public function messageType()
    {
        return $this->hasOne('App\MessageType','id', 'type');
    }
    public function userName()
    {
        return $this->hasOne('App\User','id','sender');
    }
}
