<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    //'name', 'email', 'password', 'address',
    protected $fillable = [
        'username','password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  protected $guarded = 'Admins'

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }

}



