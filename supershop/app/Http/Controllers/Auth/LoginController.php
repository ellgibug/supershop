<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use App\Product;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $storedCartItems = DB::table('shoppingcart')->where([
                ['identifier', 'cart'.Auth::guard('web')->user()->id],
                ['instance', 'cart']
            ])->value('content');

            $storedWishlistItems = DB::table('shoppingcart')->where([
                ['identifier', 'wishlist'.Auth::guard('web')->user()->id],
                ['instance', 'wishlist']
            ])->value('content');

            $storedCartItems = \unserialize($storedCartItems);

            $storedWishlistItems = \unserialize($storedWishlistItems);

            if($storedCartItems){
                foreach ($storedCartItems as $item){
                    Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate(Product::class);
                }
            }

            if($storedWishlistItems){
                foreach ($storedWishlistItems as $item){
                    Cart::instance('wishlist')->add($item->id, $item->name, $item->qty, $item->price)->associate(Product::class);
                }
            }

            return $this->sendLoginResponse($request);
        }



        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        DB::table('shoppingcart')->where([
            ['identifier', 'cart'.Auth::guard('web')->user()->id],
            ['instance', 'cart']
        ])->delete();

        DB::table('shoppingcart')->where([
            ['identifier', 'wishlist'.Auth::guard('web')->user()->id],
            ['instance', 'wishlist']
        ])->delete();

        Cart::instance('cart')->store('cart'.Auth::guard('web')->user()->id);
        Cart::instance('wishlist')->store('wishlist'.Auth::guard('web')->user()->id);

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
