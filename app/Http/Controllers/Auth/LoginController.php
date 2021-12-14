<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;

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
    protected $redirectTo = '/back/login/security_question';

    // RouteServiceProvider::HOME

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout()
    {
      $id = Auth::user()->id;
      $user = User::find($id);
      User::where('id', $id)->update(['security_state' => 0]);
      User::where('id', $id)->update(['security_check' => 0]);
      Auth::logout();
      return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
