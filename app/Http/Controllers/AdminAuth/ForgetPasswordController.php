<?php

namespace App\Http\Controllers\AdminAuth;

//Trait
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

/**
 * Class ForgetPasswordController
 * @package App\Http\Controllers\AdminAuth
 */
class ForgetPasswordController extends Controller
{
    use SendsPasswordResetEmails;


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Override Trait Method with view we want
     */
    public function showLinkRequestForm()
    {
        return view('admin.passwords.email');
    }

    /**
     * @return mixed
     * Password Broker For Admin
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}
