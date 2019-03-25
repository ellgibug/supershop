@extends('layouts.master')
@section('title', 'главная страница')
@section('description', '')
@section('robots', 'all')

@section('content')
<div class="page">

    <section class="page-block double-padding-top double-padding-bottom">
        <div class="ms-showcase">
            <div class="master-slider ms-skin-light-6 round-skin" id="showcase-slider">
                <div class="ms-slide">
                    <img src="masterslider/blank.gif" data-src="{{ asset('img/slider_1.jpg') }}" alt="01"/>
                </div>
                <div class="ms-slide">
                    <img src="masterslider/blank.gif" data-src="{{ asset('img/slider_2.jpg') }}" alt="02"/>
                </div>
                <div class="ms-slide">
                    <img src="masterslider/blank.gif" data-src="{{ asset('img/slider_3.jpg') }}" alt="03"/>
                </div>
            </div>
        </div>
    </section>

    <section class="page-block category-tiles double-padding-top">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div  class="category" style="background-image: url({{ asset('img/pr_1.jpg') }});">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div  class="category" style="background-image: url({{ asset('img/pr_2.jpg') }});">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div  class="category" style="background-image: url({{ asset('img/pr_4.jpg') }});">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div  class="category" style="background-image: url({{ asset('img/pr_3.jpg') }});">
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-block double-padding-top">
        <div class="container">
            <div class="page-heading center">
                <h2>Специальные предложения</h2>
                <h3>Для наших ЛЮБИМЫХ клиентов<span></span></h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="thumbnail-3d">
                        <div class="inner">
                            <div class="overlay bg-white">
                                <div class="info">
                                    <h4>Быстрая доставка</h4>
                                    <p>Склады наших товаров находятся на всей территории России.</p>
                                    <a class="btn btn-primary" href="{{ route('dap.index') }}">Способы доставки</a>
                                </div>
                            </div>
                            <img src="{{ asset('img/delivery.png') }}" alt="Доставка, оплата, возврат"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="thumbnail-3d">
                        <div class="inner">
                            <div class="overlay bg-white">
                                <div class="info">
                                    <h4>Скидка на Товар дня</h4>
                                    <p>Голосуйте за Товар дня, который будет продан со скидкой 40%</p>
                                    <a class="btn btn-primary" href="{{ route('votes.index') }}">Голосование</a>
                                </div>
                            </div>
                            <img src="{{ asset('img/gift.png') }}" alt="Голосование"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="thumbnail-3d">
                        <div class="inner">
                            <div class="overlay bg-white">
                                <div class="info">
                                    <h4>Делитесь впечатлениями от покупок</h4>
                                    <p>Оставляйте отзывы на купленные товары и ведите личный блог</p>
                                    <a class="btn btn-primary" href="{{ route('posts.index') }}">Блог</a>
                                </div>
                            </div>
                            <img src="{{ asset('img/blog.png') }}" alt="Блог"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="thumbnail-3d">
                        <div class="inner">
                            <div class="overlay bg-white">
                                <div class="info">
                                    <h4>Мы постоянно развиваемся</h4>
                                    <p>Нам очень важно мнение о нашей работе и мы всегда открыты для новых отзывов и предложений</p>
                                    <a class="btn btn-primary" href="{{ route('contacts.index') }}">Оставить отзыв</a>
                                </div>
                            </div>
                            <img src="{{ asset('img/contacts.png') }}" alt="Контакты"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(\count($brands))
    <section class="page-block gray-bg space-top">
        <div class="container">
            <div class="page-heading center">
                <h2>Бренды</h2>
            </div>
            <div class="logo-carousel double-space-bottom" data-auto-play="true" data-timeout="3000">
                @foreach($brands as $brand)
                <a href="{{ route('brand', $brand->slug) }}"><img src="{{ $brand->image_small }}" alt="{{ $brand->name }}"/></a>
                @endforeach
                <a href="{{ route('shop.brands') }}"><img src="{{ asset('brands_logos/all_brands.png') }}" alt="Все бренды"/></a>
            </div>
            <a href="{{ route('shop.brands') }}" class="btn btn-primary btn-md btn-center">Все бренды</a>
        </div>
    </section>
    @endif

    <section class="page-block catalog-grid type-2 double-padding-top">
        <div class="container">
            <div class="page-heading center">
                <h2>Новинки</h2>
                <h3>Все новые товары оказываются сразу у нас в магазине!<span></span></h3>
            </div>
            <div class="row">
                @foreach($new_products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        @if($product->label)
                            <span class="badge sale">{{ $product->label }}</span>
                        @endif
                        <a class="thumb" href="{{ route('shop.product', ['main_category' => $product->category->mainCategory->slug, 'category' => $product->category->slug, 'product' => $product->slug]) }}">
                            <span class="overlay"></span>
                            @if(\count($product->images))
                                <img src="{{ asset($product->images->first()->image) }}" alt="{{ $product->name }}"/>
                            @else
                                <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}"/>
                            @endif

                            <div class="description">
                                <h3>{{ $product->name }}</h3>
                                <p>Бренд: {{ $product->brand->name }}</p>
                                @foreach($product->filters->take(2) as $filter)
                                    <p>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</p>
                                @endforeach
                            </div>
                        </a>
                        <footer>
                            <div class="info"><span class="price">{{ \number_format($product->price,0,'', ' ') }} &#8381;</span></div>
                            <div class="tools">
                                <a class="add-cart" href="{{ route('cart.add', $product->id) }}">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;В корзину
                                </a>
                                <a class="add-wishlist" href="{{ route('wishlist.add', $product->id) }}">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="info-box gray space-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8"><h3 class="light-weight light-color">Сэкономьте 40% с Товаром Дня!</h3></div>
                <div class="col-lg-4"><a class="btn btn-primary" href="{{ route('votes.index') }}">Перейти к голосованию</a></div>
            </div>
        </div>
    </section>

    <section class="page-block catalog-grid type-2 space-top">
        <div class="container">
            <div class="page-heading center">
                <h2>Популярные товары</h2>
                <h3>Эти товары пользуются спросом. Обратите на них внимание!<span></span></h3>
            </div>
            <div class="row">
                @foreach($best_products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        @if($product->label)
                            <span class="badge sale">{{ $product->label }}</span>
                        @endif
                        <a class="thumb" href="{{ route('shop.product', ['main_category' => $product->category->mainCategory->slug, 'category' => $product->category->slug, 'product' => $product->slug]) }}">
                            <span class="overlay"></span>
                            @if(\count($product->images))
                                <img src="{{ asset($product->images->first()->image) }}" alt="{{ $product->name }}"/>
                            @else
                                <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}"/>
                            @endif

                            <div class="description">
                                <h3>{{ $product->name }}</h3>
                                <p>Бренд: {{ $product->brand->name }}</p>
                                @foreach($product->filters->take(2) as $filter)
                                    <p>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</p>
                                @endforeach
                            </div>
                        </a>
                        <footer>
                            <div class="info"><span class="price">{{ \number_format($product->price,0,'', ' ') }} &#8381;</span></div>
                            <div class="tools">
                                <a class="add-cart" href="{{ route('cart.add', $product->id) }}">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;В корзину
                                </a>
                                <a class="add-wishlist" href="{{ route('wishlist.add', $product->id) }}">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection
