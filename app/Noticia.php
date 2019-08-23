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
}
