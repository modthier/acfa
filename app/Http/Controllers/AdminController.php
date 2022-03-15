<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with('admins',Admin::all());
    }

    public function users()
    {
        return view('admin.user.index')
          ->with('admins',Admin::orderBy('id','desc')->paginate(20));
    }


    public function showLoginForm()
    {
        
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        }else{
           return back()->with('login-failed','These credentials do not match our records.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.showLoginForm');
    }

    public function create()
    {
        
        return view('admin.user.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Admin::insert([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password) ,
            'created_at' => Carbon::now()
        ]);   

        $request->session()->flash('success','User has been added Successfully');
        return redirect()->route('admin.user.users');
    }

    public function edit(Admin $user)
    {
        
    }

    

    

    
}
