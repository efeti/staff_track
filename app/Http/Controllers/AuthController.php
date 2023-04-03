<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function verify(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('/');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
        
    }
        

}
