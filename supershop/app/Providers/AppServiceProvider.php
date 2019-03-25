<?php

namespace App\Providers;

use App\MainCategory;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Relations\Relation;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'posts' => Post::class,
            'products' => Product::class,
        ]);

        view()->composer('partials.header', function ($view){
            $view->with('main_categories', MainCategory::all());
            $view->with('items', Cart::instance('cart')->content());
        });

        view()->composer('partials.left_menu', function ($view){
            $view->with('main_categories', MainCategory::all());
        });

        view()->composer('partials.footer', function ($view){
            $view->with('posts', Post::where('display', 1)->orderByDesc('created_at')->get()->take(2));
        });

        view()->composer('partials.posts_menu', function ($view){
            $db_users = DB::table('posts')->select('user_id')->distinct()->get();
            $u = [];
            foreach ($db_users as $db_user){
                $u[] = $db_user->user_id;
            }
            if(\count($u)){
                $users = User::whereIn('id', $u)->get();
            } else {
                $users = NULL;
            }

            $db_products = DB::table('post_product')->select('product_id')->distinct()->get();
            $p = [];
            foreach ($db_products as $db_product){
                $p[] = $db_product->product_id;
            }
            if(\count($p)){
                $products = Product::whereIn('id', $p)->get();
            } else {
                $products = NULL;
            }
            $view->with('products', $products);
            $view->with('users', $users);
        });


        //Пагинация для коллекций
        if (!Collection::hasMacro('paginate')) {
            Collection::macro('paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                        ->withPath('');
                });
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
