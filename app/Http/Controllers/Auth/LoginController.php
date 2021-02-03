<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\SendMessage\WhatsApp\SendMessage;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

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

        $credentials = $request->only('user', 'password');

        if (Auth::attempt($credentials)) {
            $obj = new SendMessage('WHATSAPP', '+541130599120', 'Has iniciado session. No fuiste vos???? (Test)');
            $obj->sendMessage();
            return redirect()->intended('/');
        }

        return redirect('login')->with('message', 'Oppes! You have entered invalid credentials');
    }



}
