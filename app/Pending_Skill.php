<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending_Skill extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
