<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    public function subjects(){
        $this->belongsTo(SUbject::class);
    }
}
