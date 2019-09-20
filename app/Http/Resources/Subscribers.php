<?php
//para que asi vuelvan los datos de subscribers
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Subscribers extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
