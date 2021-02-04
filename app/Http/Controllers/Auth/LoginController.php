<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\SendMessage\SendMessage\SendMessage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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

    use AuthenticatesUsers;

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

    public function authenticate(Request $request)
    {

        $validator = $request->validate([
            'user' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if (Auth::attempt($validator)) {
            /*$obj = new SendMessage('WHATSAPP', '+541130599120', 'Has iniciado session. No fuiste vos???? (Test)');
            $obj->sendMessage();*/
            $request->session()->regenerateToken();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors(['user' => trans('auth.failed')])
            ->withInput(request(['user']));

    }

}
