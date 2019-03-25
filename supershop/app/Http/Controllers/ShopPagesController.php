<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Contact;
use App\MainCategory;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ShopPagesController extends Controller
{
    public function index()
    {
        $brands = Brand::inRandomOrder()->get()->take(10);
        $best_labels = ['Хит продаж', 'Лучшая цена'];
        $best_products = Product::whereIn('label', $best_labels)->inRandomOrder()->get()->take(6);
        $new_products = Product::where('label', 'Новинка')->inRandomOrder()->get()->take(3);
        return view('shop.index', compact(['best_products', 'new_products', 'brands']));
    }

    public function getMainCategory(Request $request, $slug)
    {
        $slug = basename(request()->path());
        $main_category = MainCategory::findBySlug($slug);
        return view('shop.main_category', compact(['main_category']));
    }

    public function getCategory(Request $request, $slug)
    {
        $slug = basename(request()->path());
        $category = Category::findBySlug($slug);
        $products = $category->products;

        // бренды и цены
        /*
        $brand_ids = collect();
        $prices = collect();
        foreach($products as $product){
            ! $prices->contains($product->price) ? $prices = $prices->push($product->price) : '';
            ! $brand_ids->contains($product->brand_id) ? $brand_ids = $brand_ids->push($product->brand_id) : '';
        }
        $brands = collect();
        foreach ($brand_ids as $id){
            $brand = Brand::findOrFail($id);
            $brands = $brands->push($brand);
        }
        */

        // минимальная и максимальная цены
        /*
        $min_price = $prices->min();
        $max_price = $prices->max();
        */

        // сортировка по цене
        if ($request->has('price')) {
            if($request->price == 'asc') {
                $products = $products->sortBy('price');
            }
            if($request->price == 'desc') {
                $products = $products->sortByDesc('price');
            }
        }

        $products = $products->paginate(9)->appends([
            'price' => $request->price
        ]);

//        return view('shop.category', compact(['category', 'products', 'brands', 'min_price', 'max_price']));
        return view('shop.category', compact(['category', 'products']));
    }

    public function getProduct(Request $request, $slug)
    {
        $slug = basename(request()->path());
        $product = Product::findBySlug($slug);
        return view('shop.product', compact(['product']));
    }

    public function getSearchResults(Request $request)
    {
        if($request->has('search')){
            $products = Product::where('name', 'like', '%' . $request->search . '%');
            $results_count = $products->count();
            // сортировка по цене
            if ($request->has('price')) {
                if($request->price == 'asc') {
                    $products = $products->sortBy('price');
                }
                if($request->price == 'desc') {
                    $products = $products->sortByDesc('price');
                }
            }
            $products = $products->paginate(9)->appends([
                'price' => $request->price,
                'search' => $request->search
            ]);
            return view('shop.search', compact(['products', 'results_count']));
        } else {
            return redirect()->action('ShopPagesController@index');
        }
    }

    public function getBrand(Request $request, $slug)
    {
        $slug = basename(request()->path());
        $brand = Brand::findBySlug($slug);
        $products = $brand->products;
        $results_count = $products->count();
        // сортировка по цене
        if ($request->has('price')) {
            if($request->price == 'asc') {
                $products = $products->sortBy('price');
            }
            if($request->price == 'desc') {
                $products = $products->sortByDesc('price');
            }
        }
        $products = $products->paginate(9)->appends([
            'price' => $request->price
        ]);
        return view('shop.brand', compact(['brand', 'products']));
    }

    public function getAllBrands()
    {
        $brands = Brand::all()->sortBy('name');
        $brand_names = $brands->pluck('name');
        $first_letters = collect();
        foreach ($brand_names as $brand_name){
            $first_letters = $first_letters->push(\mb_substr($brand_name, 0, 1, "utf-8"));
        }
        $first_letters = $first_letters->unique()->sort();
        return view('shop.brands', compact(['brands', 'first_letters']));
    }

    public function getVotes()
    {
        return view('shop.votes');
    }

    public function getDeliveryAndPayment()
    {
        return view('shop.dap');
    }

    public function getRules()
    {
        return view('shop.rules');
    }

    public function getContacts()
    {
        return view('shop.contacts');
    }

    public function storeContacts(Request $request)
    {
        // валидация
        $this->validate($request,[
            'name'      => 'required|max:30|string',
            'email'     => 'required|max:255|email',
            'message'   => 'required|max:255|string',
        ]);

        // сохранение в БД
        $contact            = new Contact();
        $contact->name      = $request->name;
        $contact->email     = $request->email;
        $contact->message   = $request->message;
        $contact->saveOrFail();

        // вернуться назад с сообщением
        Session::flash('contactsMessage', 'Ваше сообщение отправлено. Мы обязательно его прочитаем :)');
        return back();
    }

}
