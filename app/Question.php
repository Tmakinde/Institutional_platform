<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function options(){
        return $this->hasOne(Option::class);
    }
    public function topics(){
        return $this->belongsTo(Topic::class);
    }
    
}
