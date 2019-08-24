<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','asunto','descripcion','activo'];

       /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function toArray()
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'asunto' => $this->asunto,
            'descripcion' => $this->descripcion,            
            'activo'   => $this->activo,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
