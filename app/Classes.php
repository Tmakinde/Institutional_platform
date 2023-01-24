<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Classes extends Model
{
    
    protected $table = 'classes';
    protected $fillable = [
        'class','institution_id',
    ];

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
