<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ;

    /**
     * Create a new controller instance.
     *
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id'=>1])) {
            return redirect()->route('admin.dashboard');
        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id'=>2])) {
            return redirect()->route('author.dashboard');
        } elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_id'=>3])){
            return redirect()->route('home');

        }
        else{
            return redirect()->route('login')
                ->with('error_mess_login','Wrong!! Please Check your Credentials');
        }

    }
}
