<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending_Course extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}
