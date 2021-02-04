<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function update(Request $request)
    {
        $validator = $request->validate([
            'user' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Auth::attempt($validator)) {
            /*$obj = new SendMessage('WHATSAPP', Auth::user()->mobile, trans('auth.login_alert'));
            $obj->sendMessage();*/
            $request->session()->regenerateToken();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

    }
}
