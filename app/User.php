<?php

namespace App;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class  User  extends  Authenticatable  implements  JWTSubject 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function  getJWTIdentifier() {
		return  $this->getKey();
	}

	public  function  getJWTCustomClaims() {
		return [];
	}

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
     * Get the comments for the blog post.
     */
    public function referido()
    {
        return $this->hasMany('App\Referido');
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
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,            
            'activo'        => $this->activo,
            'noticia'       => $this->noticia,
            "created_at"    => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
