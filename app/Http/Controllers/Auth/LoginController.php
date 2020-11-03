<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

   /* public function register(Request $request)
   {
        $validation = $this->validator($request->all());
        if ($validation->fails())  {
            return redirect()->back()->with(['errors'=>$validation->errors()->toArray()]);
        }
        else{
            $user = $this->create($request->all());
            Auth::login($user); 
            return redirect('/dashboard')->with(['message'=>'Account Successfully Created.']);
                }
                    }*/

                    