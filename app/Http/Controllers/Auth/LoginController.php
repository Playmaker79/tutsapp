<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    private $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->status == 0 && $user->type == 'mentor'){
                return redirect()->route('uploadCV');
        }
    }


    protected function sendLoginResponse(Request $request)
    {
        /* Get current user type */

       $user_type = $this->guard()->user()->type;

        /*
         * Get current user type
         * Redirect to the respective users dashboard */

        if ($user_type =="admin")

            $this->redirectTo = '/admin/dashboard';

        else if($user_type =="mentor")

            $this->redirectTo = '/mentor/dashboard';

        else if($user_type =="student")

            $this->redirectTo = '/student/dashboard';

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
}
