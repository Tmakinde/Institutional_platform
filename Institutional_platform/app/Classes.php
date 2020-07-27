<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Classes extends Model
{
    
    protected $table = 'classes';
    protected $fillabels = [
        'class',
    ];

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }
}
