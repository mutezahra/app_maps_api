<?php

namespace App\Http\Controllers\Auth;

use App\Models\LogM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
     
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // $logM = LogM::create([
        //     'id_user' => Auth::user()->id,
        //     'activity' => 'User Logout'
        // ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
