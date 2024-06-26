<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\UserInterest;
use App\Models\Course;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('auth.register')
          ->with([
              'countries' => Country::all() ,
              'courses' => Course::all()
            ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'whatsapp_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country_id' => 'required',
            'interest' => 'required'
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'whatsapp_phone' => $request->whatsapp_phone ,
            'country_id' => $request->country_id
            
        ]));

        if ($request->has('other')) {
            $data = [
                'interest' => $request->other ,
                'user_id' => $user->id
            ];
            UserInterest::create($data);
        }else {
            $data = [
                'interest' => $request->interest ,
                'user_id' => $user->id
            ];
            UserInterest::create($data);
        }

        event(new Registered($user));


        return redirect()->intended(RouteServiceProvider::HOME);
        
    }
}
