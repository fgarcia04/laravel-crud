<?php


namespace App\Exceptions;


use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomException extends Exception
{

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render()
    {
        Auth::logout();
        return back()->withErrors(['user' => trans('error.generic_error')])
            ->withInput(request([
                'user',
                'name',
                'mobile',
                'email',
            ]));
    }

}
