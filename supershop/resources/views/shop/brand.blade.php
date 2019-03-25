@extends('layouts.master')
@section('title', $brand->name)
@section('description', '')
@section('robots', 'all')

@section('content')
    <div class="page">

        <section style="background-image: url({{ asset($brand->image_big) }});" class="hero-static fullscreen" data-stellar-background-ratio="0.5">
            <div class="overlay dark"></div>
            <div class="inner">
                <div class="content">
                    <div class="container">
                        <h1 class="light-color left">{{ $brand->name }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <div style="position: relative;" class="container space-top group sorting">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">{{ $brand->name }}</li>
            </ol>
            <ol class="sort">
                <li>Сортировать по цене</li>
                <li class="{{ request()->get('price') == 'asc' ? 'active' : '' }}"><a href="{{ route('brand', ['brand' => $brand->slug, 'price' => 'asc']) }}">По возрастанию </a></li>
                <li class="{{ request()->get('price') == 'desc' ? 'active' : '' }}"><a href="{{ route('brand', ['brand' => $brand->slug, 'price' => 'desc']) }}">По убыванию</a></li>
            </ol>
        </div>

        <section class="catalog-grid type-2">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
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
                <div class="space-top space-bottom">
                    {{ $products->links() }}
                </div>
            </div>
        </section>

    </div>
@endsection
