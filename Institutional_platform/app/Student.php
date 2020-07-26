<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function admins(){
        return $this->belongsTo(Admin::class);
    }
}
