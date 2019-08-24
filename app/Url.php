<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','urlAcotada','urlOriginal','titulo', 'visitas','activo'];

    public function categoria()
    {
        return $this->hasOne('App\Categoria');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function toArray()
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
