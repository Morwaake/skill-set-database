<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['user_id', 'link'];

    public function course(){
        return $this->belongsTo('App\Course'); 
    }
}
