<?php

namespace CodeFin\Http\Controllers\Auth;

use CodeFin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //Subscreve o método credentials da AuthenticatesUsers
    protected function credentials(Request $request)
    {
        //Lembrando que para usar o Request, precisamos declarar a use Illuminate\Http\Request;
        $data = $request->only($this->username(),'password');
        $data['role'] = \CodeFin\User::ROLE_ADMIN; //constante criada na classe User
        return $data;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(env('URL_ADMIN_LOGIN'));
    }
}
