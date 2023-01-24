<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    
   public function subjects(){
      return  $this->belongsTo(Subject::class);
   }

   public function questions(){
      return  $this->hasMany(Question::class);
   }
   
   public function exams(){
      return $this->hasOne(Exam::class);
  }
}
