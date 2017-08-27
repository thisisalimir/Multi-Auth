<?php

namespace App;

//Reason we use is our custom guard need to be instance Authentication
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * @package App
 */
class Admin extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'admins';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];


    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
