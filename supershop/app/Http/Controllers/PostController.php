<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Image;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Transliterate;
use Session;
use File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('display', 1)->orderByDesc('created_at');

        if($request->has('author')){
            $posts = $posts->where('user_id', $request->author);
        }

        if($request->has('product')){
            $product = Product::findOrFail($request->product);
            $posts = $product->posts->sortByDesc('created_at');
        }

        $posts = $posts->paginate(3);
        return view('shop.posts_index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('shop.posts_create', compact(['products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsRequest $request)
    {
        // валидация пройдена

        // сохраняем пост
        $post           = new Post();
        $post->title    = $request->title;
        $post->body     = $request->body;
        $post->user_id  = Auth()->guard('web')->user()->id;
        $post->display  = 0;
        $post->saveOrFail();

        // если есть товары в посте
        if ($request->has('products')) {
            foreach ($request->products as $product) {
                $post->products()->attach($product);
            }
        }

        if ($request->has('images')){
            // сохраняем фото в папку на сервере и записываем в БД
            foreach ($request->file('images') as $image) {
                $fullname = $image->getClientOriginalName(); // имя файла с раширением abc.1.png
                $extension = $image->getClientOriginalExtension(); // расширение файла png
                $name = basename($fullname, '.' . $extension); // имя файла без раширением abc.1
                $suitable_name = Transliterate::make($name, ['type' => 'filename', 'lowercase' => true]); // имя файла в нормальном формате
                $new_name = $suitable_name . '_' . date('ymdHis') . '_' . Auth()->guard('web')->user()->id . '.' . $extension; // новое имя файла, которого нет на сервере

                $image->move(public_path() . '/posts_images/', $new_name);

                $img = new Image();
                $img->imageable_id = $post->id;
                $img->imageable_type = 'posts';
                $img->image = '/posts_images/' . $new_name;
                $img->saveOrFail();

            }
        }

        Session::flash('postsStoreMessage', 'Спасибо за Ваш пост! Он скоро будет опубликован :)');
        return redirect()->action('PostController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('shop.posts_show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id == Auth()->guard('web')->user()->id){
            $products = Product::all();
            $posts_products = $post->products()->pluck('product_id', 'products.id')->toArray();
            return view('shop.posts_edit', compact(['post', 'products', 'posts_products']));
        } else {
            return redirect()->action('PostController@index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostsRequest $request, $id)
    {
        // валидация пройдена

        // сохраняем пост
        $post = Post::findOrFail($id);
        if($post->user_id == Auth()->guard('web')->user()->id) {
            $post->title = $request->title;
            $post->body  = $request->body;
            $post->saveOrFail();

            // если есть товары в посте
            if ($request->has('products')) {
                // удалить старые товары
                $post->products()->detach();
                // добавить новые
                foreach ($request->products as $product) {
                    $post->products()->attach($product);
                }
            }

            if ($request->has('images')) {
                // сохраняем фото в папку на сервере и записываем в БД
                foreach ($request->file('images') as $image) {
                    $fullname = $image->getClientOriginalName(); // имя файла с раширением abc.1.png
                    $extension = $image->getClientOriginalExtension(); // расширение файла png
                    $name = basename($fullname, '.' . $extension); // имя файла без раширением abc.1
                    $suitable_name = Transliterate::make($name, ['type' => 'filename', 'lowercase' => true]); // имя файла в нормальном формате
                    $new_name = $suitable_name . '_' . date('ymdHis') . '_' . Auth()->guard('web')->user()->id . '.' . $extension; // новое имя файла, которого нет на сервере

                    $image->move(public_path() . '/posts_images/', $new_name);

                    $img = new Image();
                    $img->imageable_id = $post->id;
                    $img->imageable_type = 'posts';
                    $img->image = '/posts_images/' . $new_name;
                    $img->saveOrFail();

                }
            }
        } else {
            return redirect()->action('PostController@index');
        }

        Session::flash('postsStoreMessage', 'Ваш пост отредактирован :)');
        return redirect()->action('PostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // на удаление изображений
        if($request->ajax()){
            // нашли изображение для удаления
            $image = $post->images->where('id', $request->image)->first();
            // удалили с сервера
            File::delete(public_path($image->image));
            // удалили из БД
            $image->delete();

            return response()->json([
                'status' => 'ok',
            ]);
        }


    }
}
