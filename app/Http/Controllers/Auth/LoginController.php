<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function authenticated($request, $user)
    {
        $userd = User::where('id','=',Auth::user()->id)->first();
        if($userd->account_status == 'suspended')
        {
            Auth::logout();
            return redirect()->route('login')->with('danger','You are currently suspended.');
        }
        if($userd->restaurant_id == 0 && $userd->role != 'admin')
        {
            Auth::logout();
            Session::flush();
            return redirect()->back()->with('danger','You are not assigned yet.');
            
        } else {
            $userd->notification_token = rand() * 100; 
            $userd->save();
            if ($userd->role == 'admin') {
                $status = 'admin';
            }
            if ($userd->role == 'user') {
                $status = 'user';
            }
            if ($userd->role == 'waiter') {
                $status = 'waiter';
            }
            if ($userd->role == 'manager') {
                $status = 'manager';
            }
            return redirect($status);
        }
    }
}
