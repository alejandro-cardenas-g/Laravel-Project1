<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    //Relación One 2 Many

    public function comments(){
        return $this->hasMany('App\Models\comment');
    }
    //Relación One 2 Many
    public function likes(){
        return $this->hasMany('App\Models\like');
    }

    //Relación Many 2 One

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

}
