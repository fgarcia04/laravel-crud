<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        User::where('id', Auth::user()->id)
            ->update([
                'name'=> 'Federico Garcia'
            ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
