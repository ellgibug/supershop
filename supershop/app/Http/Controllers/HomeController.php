<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests\UserPersonalInfoRequest;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.user_index');
    }

    public function updatePersonalInfo(UserPersonalInfoRequest $request)
    {
        // валидация данных пройдена

        // обновление данных
        $user = User::findOrFail(Auth()->guard('web')->user()->id);
        $user->surname = $request->surname;
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->gender  = $request->gender;
        $user->address = $request->address;
        $user->zip     = $request->zip;
        $user->bday    = $request->year . '-' .$request->month . '-' . $request->date;
        if($request->password){
            $user->password = \bcrypt($request->password);
        }
        $user->saveOrFail();
        Session::flash('updatePersonalInfoMessage', 'Информация обновлена!');
        return back();
    }

    public function getOrders()
    {
        $orders = Order::where('user_id', Auth::guard('web')->user()->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('shop.user_orders', compact(['orders']));
    }

    public function getReviews()
    {
        return view('shop.user_reviews');
    }

    public function getNotifications()
    {
        return view('shop.user_notifications');
    }

    public function getVotes()
    {
        return view('shop.user_votes');
    }
}
