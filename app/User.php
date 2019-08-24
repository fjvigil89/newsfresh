<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function url()
    {
        return $this->hasMany('App\Url');
    }
      /**
     * Get the comments for the blog post.
     */
    public function factura()
    {
        return $this->hasMany('App\Factura');
    }

     /**
     * Get the post that owns the comment.
     */
    public function noticia()
    {
        return $this->belongsTo('App\Noticia');
    }

    public function toArray()
    {
          //return parent::toArray($request);
          return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,            
            'activo'   => $this->activo,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
