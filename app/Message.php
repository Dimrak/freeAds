<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
   protected $guarded = [];
    //para escribir menos logica en el controller
    public function scopeUnread($query)
    {
        return $query->where('status', 0);
    }
    public function messageType()
    {
        return $this->hasOne('App\MessageType','id', 'type');
    }
    public function userName()
    {
        return $this->hasOne('App\User','id','sender');
    }
    public function scopeUser($query,$user){
        return $query->where('recip_id', $user->id);
    }
    public function scopeNotRead($query){
        return $query->where('status', 1);
    }
}
