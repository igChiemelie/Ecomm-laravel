<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Cache;


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
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function credentials(Request $request)
    {
        if(filter_var($request->get('email'),FILTER_VALIDATE_EMAIL)){
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }else{
            return ['username' => $request->get('email'), 'password' => $request->get('password')];
        }
    }
    protected function redirectTo()
    {

        if(Auth::user()->userType == 'Admin'){
            // return redirect('/pages');
            return 'pages';
        }

        if(Auth::user()->userType == 'E_CommerceAgent'){
            // return redirect('/ecomm');
            return 'ecomm';

        }

        if (Auth::user()->userType == 'DeliveryAgent') {
            return 'agent';
            // return redirect('/');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

    public function logout(Request $request)
    {
        Auth::logout();
        // Cache::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
