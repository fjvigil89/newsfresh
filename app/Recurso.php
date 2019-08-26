<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','url','activo'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function toArray()
    {
         //return parent::toArray($request);
         return [
            'id'            => $this->id,
            'nombre'        => $this->nombre,
            'url'           => $this->url,            
            'activo'        => $this->activo,
            'categoria'     => $this->categoria,
            "created_at"    => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
