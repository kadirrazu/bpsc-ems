<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function systemLogin(){

        if( Auth::check() ){
            return redirect('admin/dashboard');
        }

        return view('login');
    }

    public function processLogin()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if( auth()->attempt($attributes) )
        {
            return redirect('admin/dashboard')->withSuccess('Welcome to Dashboard!');
        }

        return back()->withInput()->withError('Email and Password does not matched with the database.');

    } //End of function 'processLogin'

    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function logout(Request $request)
    {

        $redirect = $request->input('refferer') ?? '';

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        if( $redirect != '' )
        {
            return redirect($redirect)->with('info', 'You have logged out from the system.');
        }
    
        return redirect('/')->with('info', 'You have logged out from the system.');

    }

    public function profile()
    {
        return view('admin.profile');
    }

    

    public function changePassword()
    {
        return view('admin.change-password');
    }
    
}
