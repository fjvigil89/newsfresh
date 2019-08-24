<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;
class Urls extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
          //return parent::toArray($request);
          return [
            'id'=>$this->id,                
            'urlAcotada'=>$this->urlAcotada,
            'urlOriginal'=>$this->urlOriginal,
            'titulo'=>$this->titulo,                
            'visitas'=>$this->visitas,  
            'activo'=>$this->activo,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
          
            
        ];

    }
}
