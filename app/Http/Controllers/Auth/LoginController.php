<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\carrito;

use Illuminate\Http\Request;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * authenticated
     *
     * @param  mixed $req
     * @param  mixed $user
     * @return void
     */
    public function authenticated (Request $req, $user){
        if(!Auth::user()->admin):
            $car = new Carrito();
            $car->save();
            session(['idCar'=>$car->idCar]);
            
            return redirect()->route('inicio');
        endif;
        //
        return redirect()->route('bota.todas');
    }

    public function index(){
        return view('login');
    }

}
