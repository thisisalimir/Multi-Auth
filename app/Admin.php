<?php

namespace App;

//Reason we use is our custom guard need to be instance Authentication
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'name' , 'email','password'
    ];


    protected $hidden = [
      'password','remember_token'
    ];
}
