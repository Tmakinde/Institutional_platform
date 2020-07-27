<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    public function institutions(){
        return $this->belongsTo(Institution::class);
    }
}
