<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = 'admin/home';//RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if(auth()->user()->prive  == 0)
        {
            $this->redirectTo = '/admin/homeAdmin';
        return $this->redirectTo;
        }elseif(auth()->user()->prive===1)
        {
            $this->redirectTo = '/admin/home';
            return $this->redirectTo;
        }elseif(auth()->user()->prive===2)
        {
            $this->redirectTo = '/admin/home';
            return $this->redirectTo;
        }
        else{
            abort(404);
        }
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
