<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Member;

class UserController extends Controller
{
    
    public function systemLogin(){

        if( Auth::check() ){
            return redirect('admin/dashboard');
        }

        return view('login');
    }

    public function processLogin(Request $request)
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if( auth()->attempt($attributes) )
        {
            
            if( auth()->user()->status === 0 ){

                Auth::logout();
 
                $request->session()->invalidate();
            
                $request->session()->regenerateToken();

                return redirect('/')->withError('You are not permitted to login.');

            }

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

    public function updatePassword()
    {
        
        $attributes = request()->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|nullable|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        $user->password = bcrypt($attributes['password']);

        $user->save();

        return redirect('/admin/change-password')->withSuccess('Password was updated successfully.');
        
    }

    public function addUserView(){

        return view('admin.user.add');

    }

    public function addUserPrcessing()
    {
        
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'status' => 'required',
            'password' => 'required|nullable|confirmed|min:6',
            'password_confirmation' => 'required',
            'joining_date' => 'nullable',
            'leaving_date' => 'nullable',
            'unit' => 'nullable',
        ],
        [
            'role_id.required' => 'Please select a user Role.',
            'status.required' => 'Please select a Status for this ueser.',
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'role_id' => $attributes['role_id'],
            'status' => $attributes['status'],
        ]);
 
        $insertedUserId = $user->id;

        if( $attributes['role_id'] == 4 ){
            Member::create([
                'user_id' => $insertedUserId,
                'joining_date' => $attributes['joining_date'],
                'leaving_date' => '',
                'unit' => $attributes['unit'],
            ]);
        }

        return redirect('/admin/add-user')->withSuccess('User was created successfully.');
    }

    public function listUser()
    {
        return view('admin.user.list');
    }

    public function viewUserDetails(Request $request)
    {
        $user = User::findOrFail( $request->id );

        return view('admin.user.details', ['user' => $user]);
    }

    public function editUser(Request $request)
    {
        $user = User::findOrFail( $request->id );

        return view('admin.user.edit', ['user' => $user]);
    }

    public function editUserProcessing(Request $request)
    {
        $user = User::findOrFail( $request->id );

        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'status' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => 'nullable',
            'joining_date' => 'nullable',
            'leaving_date' => 'nullable',
            'unit' => 'nullable',
        ],
        [
            'role_id.required' => 'Please select a user Role.',
            'status.required' => 'Please select a Status for this ueser.',
        ]);

        $user->name = $attributes['name'];
        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        $user->role_id = $attributes['role_id'];
        $user->status = $attributes['status'];

        if( $attributes['password'] != "" ){
            $user->password = bcrypt( $attributes['password'] ); 
        }
 
        $user->save();

        if( $attributes['role_id'] == 4 )
        {
            $member = Member::where('user_id', $request->id)->get();

            $member->joining_date = $attributes['joining_date'];
            $member->leaving_date = $attributes['leaving_date'];
            $member->unit = $attributes['unit'];

            $member->save();
        }

        return redirect('/admin/user-list')->withSuccess('User was updated successfully.');

    }
    
}
