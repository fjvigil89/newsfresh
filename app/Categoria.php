<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','activo'];

     /**
     * Get the user that owns the phone.
     */
    public function url()
    {
        return $this->hasMany('App\Url');
    }

     /**
     * Get the user that owns the phone.
     */
    public function recurso()
    {
        return $this->hasMany('App\Recurso');
    }

    public function toArray()
    {
        return [
            'id'            => $this->id,
            'nombre'        => $this->nombre,
            'activo'        => $this->activo,            
            "created_at"    => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at'        => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }

}
