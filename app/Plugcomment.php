<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plugcomment extends Model
{
    protected $fillable=[
        'comment','user_id','plug_id','created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plug(){
        return $this->belongsTo(Plug::class);
    }
}
