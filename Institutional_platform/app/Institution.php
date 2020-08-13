<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;

class Institution extends Model implements CanResetPasswordContract
{
    //
    use CanResetPassword;
    use Notifiable;
    protected $table = 'institutions';
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function users(){
        return $this->hasManyThrough(User::class, Classes::class);
    }

    public function classes(){
        return $this->hasMany(Classes::class);
    }
}

