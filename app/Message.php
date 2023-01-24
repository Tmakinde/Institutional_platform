<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['title', 'message', 'admin_id'];

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

}
