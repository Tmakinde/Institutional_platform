<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password','address', 'username', 'is'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function users(){
        return $this->hasManyThrough(User::class, Admin::class);
    }
}

