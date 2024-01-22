<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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

    // use AuthenticatesUsers;

    public function show_login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $request->session()->regenerate();
            
            // notify()->success('Welcome back '.auth()->user()->first_name.'');
            
            return redirect()->intended(route('dashboard'));
         

             // User login successful
            //  $user = User::whereEmail($request['email'])->first();
            //  $roleData = role::find(Auth::user()->role_id);
            //  $role = $roleData->name; 
 
            //  if ($role == '') {
            //      return redirect()->intended(route('admin.dashboard'));
            //  }
            //  elseif ($role == 'Regional coordinator') {
            //      return redirect()->intended(route('admin.dashboard'));
            //  }
            //   elseif ($role == 'AMREF personnel') {
            //      return redirect()->intended(route('admin.dashboard'));
            //  }
            
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
        
    }

    public function userProfile() {
        // $email = auth()->user()->email;

        return view('admin_panel.user_profile');
    }

    public function changePassword() {
        // $email = auth()->user()->email;

        return view('auth.passwords.reset');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}