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
        return $this->hasOne('App\Categoria');
    }
}
