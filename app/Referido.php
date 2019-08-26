<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Referido extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_asociado', 'activo'];
    
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
            'id'            => $this->id,            
            'activo'        => $this->activo,
            'id_asociado'   => $this->id_asociado,
            'user'          => $this->user,
            "created_at"    => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('d-m-Y'),
        ];
    }
}
