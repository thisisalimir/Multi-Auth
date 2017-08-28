<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\AdminAuth
 */
class ResetPasswordController extends Controller
{
    /**
     * @var string
     */
    protected $redirectTo = '/admin_home';
    use ResetsPasswords;

    /**
     * @param Request $request
     * @param null $token
     * @return $this
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * @return mixed
     */
    public function broker()
    {
        return Password::broker('admins');
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('web_admin');
    }
}
