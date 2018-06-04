<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plug extends Model
{
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    protected $fillable=[
        'title','subtitle','head','slug','body','image','user_id','created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plugcomments(){
        return $this->hasMany(Plugcomment::class);
    }
}