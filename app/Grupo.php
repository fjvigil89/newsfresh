<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','url','seguidores', 'nombre','activo'];

    public function toArray()
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'url' => $this->url,
            'seguidores' => $this->seguidores,
            'nombre'  => $this->nombre,
            'activo'   => $this->activo,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
