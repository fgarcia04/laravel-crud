<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\LowerCase;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'user' => ['required', 'alpha_num', 'max:255', 'unique:users,id', new LowerCase],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', new PhoneNumber],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'user'=> $request['user'],
                'name'=> $request['name'],
                'mobile'=> $request['mobile'],
                'email'=> $request['email'],
                'password'=> $request['password'],
            ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
