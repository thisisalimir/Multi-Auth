<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegisterController
 * @package App\Http\Controllers\AdminAuth
 */
class RegisterController extends Controller
{
    /**
     * @var string
     * Declare Place to Redirect after Login Admin
     */
    protected $redirectPath = 'admin_home';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *  Show Register Form to Admin
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }


    /**
     * @param Request $request
     *  Register request for Admin
     */
    public function register(Request $request)
    {
        //Validation
        $this->validator($request->all())->validate();
        //Create
        $admin = $this->create($request->all());
        //Authentication Admin
        $this->guard()->login($admin);
        //Redirect Admin
        return redirect($this->redirectPath);
    }


    /**
     * @param array $data
     * @return mixed
     * Validate User Input
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     * Create Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * @return mixed
     * Get Guard to authenticate Admin
     * Guard is for define how users are authenticate for each request
     * here we make custom guard
     */
    protected function guard()
    {
        //auth::guard is for authenticate which is default but because we
        //want our custom guard we add any name we want
        return Auth::guard('web_admin');
    }
}
