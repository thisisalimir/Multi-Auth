<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Class for Login and Logout Logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\AdminAuth
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @return mixed
     * Custom Guard For Admin
     */
    protected function guard()
    {
        return Auth::guard('web_admin');
    }
}
