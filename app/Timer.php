<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $fillable = ['exam_id', 'user_id', 'hrs', 'min', 'sec'];
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function exams(){
        return $this->belongsTo(Exam::class);
    }
    
}
