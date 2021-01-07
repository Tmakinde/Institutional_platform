<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    
    public function users(){
        return  $this->belongsToMany(User::class);
    }

    public function classes(){
        return $this->belongsTo(Subject::class, 'subjects_users');
    }

    public function topics(){
        return  $this->hasMany(Topic::class, 'subject_id');
    }

}

