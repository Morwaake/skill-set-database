<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id','name', 'obtained','year', 'category','level','status'
    ];
    
    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function skill(){
        return $this->belongsTo('App\Skill'); 
    }
}
