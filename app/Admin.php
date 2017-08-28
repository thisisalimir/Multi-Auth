<?php

namespace App;

//Reason we use is our custom guard need to be instance Authentication
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Admin
 * @package App
 */
class Admin extends Authenticatable
{

    //Trait has notify() method defined
    use Notifiable;

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

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
