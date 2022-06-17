<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Request;


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
    // protected $redirectTo ='dashboard';

    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
    }

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except('logout');
        Session::put('backUrl', URL::previous());
    }

    public function authenticated(Request $request, $user)
{
    if ($user->hasRole('superadmin')) {
        return redirect()->route('dashboard')->with('toast_success', 'Welcome,' . '&nbsp;' .$user->username);
    }elseif ($user->hasRole('rw')) {
        return redirect()->route('rt.index')->with('toast_success', 'Welcome,' . '&nbsp;' .$user->username);
    } elseif ($user->hasRole('rt')) {
        return redirect()->route('penduduk.index')->with('toast_success', 'Welcome,' . '&nbsp;' .$user->username);
    }elseif ($user->hasRole('warga')) {
        return redirect()->route('penduduk.index')->with('toast_success', 'Welcome,' . '&nbsp;' .$user->username);
    }
    return redirect()->route('login');
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}
