<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Student;
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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember');

            // Check if the login request is for an admin or Lecturer
            if (Auth::guard('web')->attempt($credentials)) {

                $request->session()->regenerate();
            
                $user = User::whereEmail($request['email'])->first();
 
                if ($user->role == 'Admin') {
                    return redirect()->intended(route('dashboard'));
                }
                elseif ($user->role == 'Lecturer') {
                    return redirect()->intended(route('lecturer.dashboard'));
                }
                    
            } elseif (Auth::guard('student')->attempt($credentials)) {
    
                $request->session()->regenerate();

                $student = Student::whereEmail($request['email'])->first();
    
                if ($student->role == 'Student') {
                    return redirect()->intended(route('student.dashboard'));
                    
                }
    
            } else {
                // Authentication failed for both admin, Lecturer, and student
                return back()->withErrors(['email' => 'Invalid email or password']);
            }


        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

        //     $request->session()->regenerate();
            
        //     // notify()->success('Welcome back '.auth()->user()->first_name.'');
            
        //     // return redirect()->intended(route('dashboard'));

        //     //  User login successful
        //      $user = User::whereEmail($request['email'])->first();
 
        //      if ($user->role == 'Admin') {
        //          return redirect()->intended(route('dashboard'));
        //      }
        //      elseif ($user->role == 'Lecturer') {
        //          return redirect()->intended(route('lecturer.dashboard'));
        //      }
        //     //   elseif (auth()->user()->role == 'student') {
        //     //      return redirect()->intended(route('admin.dashboard'));
        //     //  }
            
        // } else {
        //     return redirect()->back()->with('error', 'Invalid email or password');
        // }
        
        
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}