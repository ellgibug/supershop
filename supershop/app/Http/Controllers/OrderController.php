<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use Session;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // валидация данных пройдена

        // проверка наличия товара на складе
        // если товара в заказе больше чем на складе, то товара в заказе становится столько же сколько и на складе
        // если вообще 0, то он удаляется
        $items = Cart::instance('cart')->content();
        foreach ($items as $item){
            $product = Product::findOrFail($item->id);
            if($product->qty > 0){
                if($product->qty < $item->qty ){
                    Cart::instance('cart')->update($item->rowId, $product->qty);
                }
            } else {
                Cart::instance('cart')->remove($item->rowId);
            }
        }

        // стоимость итоговая
        $total_before = str_replace(" ","",Cart::instance('cart')->subtotal());;
        if($request->delivery_type == 2){
            if($total_before < 2000){
                $total_after = $total_before + config('constants.delivery_price');
            } else {
                $total_after = $total_before;
            }
        } elseif ($request->delivery_type == 1) {
            $total_after = $total_before;
        }


        // создание заказа
        $order                  = new Order();
        $order->number          = str_random(5); // change
        $order->user_id         = Auth()->guard('web')->user()->id;
        $order->delivery_type   = $request->delivery_type;
        $order->address         = $request->address;
        $order->zip             = $request->zip;
        $order->payment_type    = $request->payment_type;
        $order->total_before    = $total_before;
        $order->total_after     = $total_after;
        $order->coupon          = Session::get('coupon');
        $order->users_comment   = $request->users_comment;
        $order->payment_status  = $request->payment_type == 1 ? 1 : 0;
        $order->delivery_status = 1;
        $order->saveOrFail();

        // добавление товаров в таблицу order_product
        $items = Cart::instance('cart')->content();
        foreach ($items as $item){
            // добавили товар в таблицу
            $order->products()->attach($item->id, ['qty' => $item->qty]);
            // отнять от общего количества товаров в таблице товаров
            $product        = Product::findOrFail($item->id);
            $product->qty   = $product->qty - $item->qty;
            $product->save();
        }

        // удаление данных корзины
        Cart::instance('cart')->destroy();

        // удаление купона
        Session::forget('coupon');

        // отправляем пользователя на страницу с заказами, если все успешно
        Session::flash('orderStoreMessage', 'Спасибо за Ваш заказ! Мы уже работаем над ним :)');
        return redirect()->action('HomeController@getOrders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
