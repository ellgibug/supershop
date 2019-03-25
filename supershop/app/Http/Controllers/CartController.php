<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function indexCart()
    {
       $items = Cart::instance('cart')->content();
       return view('shop.cart', compact(['items']));
    }

    public function indexWishlist()
    {
        $items = Cart::instance('wishlist')->content();
        return view('shop.wishlist', compact(['items']));
    }

    public function addProductToCart(Request $request, $id)
    {
        // добавить проверку наличия товара на складе
        if($request->ajax()){
            $product = Product::findOrFail($id);
            Cart::instance('cart')->add($product->id, $product->name, 1, $product->price)->associate(Product::class);
            $cartItems = Cart::instance('cart')->content();
            $countOfCartItems =  Cart::instance('cart')->count();
            return response()->json([
                'status' => 'ok',
                'product' => $product,
                'cartItems' => $cartItems,
                'countOfCartItems' => $countOfCartItems
            ]);
        } else {
            return back();
        }
    }

    public function addProductToWishlist(Request $request, $id)
    {
        if($request->ajax()) {
            $product = Product::findOrFail($id);
            Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->price)->associate(Product::class);
            $countOfWishlistItems = \count(Cart::instance('wishlist')->content());
            return response()->json([
                'status' => 'ok',
                'countOfWishlistItems' => $countOfWishlistItems
            ]);
        } else {
            return back();
        }
    }

    public function updateProductInCart(Request $request, $id)
    {
        if($request->ajax()) {
            $cartItem = Cart::instance('cart')->update($id, $request->qty);
            $countOfCartItems =  Cart::instance('cart')->count();
            $total_before = Cart::instance('cart')->subtotal();
            if(\str_replace(" ","",$total_before) < 2000){
                $delivery_price = config('constants.delivery_price');
                $total_after = \str_replace(" ","",$total_before) + config('constants.delivery_price');
            } else {
                $delivery_price = 0;
                $total_after = $total_before;
            }

            return response()->json([
                'status' => 'ok',
                'countOfCartItems' => $countOfCartItems,
                'cartItem' => $cartItem,
                'total_before' => $total_before,
                'delivery_price' => $delivery_price,
                'total_after' => $total_after
            ]);
        } else {
            return back();
        }
    }

    public function deleteProductFromCart($id)
    {
        Cart::instance('cart')->remove($id);
        return back();
    }

    public function deleteProductFromWishlist($id)
    {
        Cart::instance('wishlist')->remove($id);
        return back();
    }
}
