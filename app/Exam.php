<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['id','hrs','min','sec'];
    
    public function topics(){
        return $this->belongsTo(Topic::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    
}
