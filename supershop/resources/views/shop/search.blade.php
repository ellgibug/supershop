@extends('layouts.master')
@section('title', 'Результаты поиска по запросу '. request()->get('search'))
@section('description', '')
@section('robots', 'none')

@section('content')

    <div class="page">

        <div class="toolbox">
            <div class="container">
                <div class="heading">
                    <button class="back-btn" onclick="goBack()"><i class="fa fa-angle-left"></i></button>
                    <h1>Поиск по запросу "{{ request()->get('search') }}". Найдено {{ $results_count }}</h1>
                </div>
            </div>
        </div>

        <div style="position: relative;" class="container space-top group sorting">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Результаты поиска</li>
            </ol>
            @if($results_count)
            <ol class="sort">
                <li>Сортировать по цене</li>
                <li class="{{ request()->get('price') == 'asc' ? 'active' : '' }}"><a href="{{ route('search', ['search' => request()->get('search'), 'price' => 'asc']) }}">По возрастанию </a></li>
                <li class="{{ request()->get('price') == 'desc' ? 'active' : '' }}"><a href="{{ route('search', ['search' => request()->get('search'), 'price' => 'desc']) }}">По убыванию</a></li>
            </ol>
            @endif
        </div>

        @if($results_count)
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
        @else
        <div class="container space-top space-bottom">
            <h3 class="text-center">К сожалению, по Вашему запросу ничего не найдено :(</h3>
            <h3 class="text-center">Попробуйте поискать еще раз!</h3>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <form method="get" class="sp-form" autocomplete="off" action="{{ route('search') }}">
                        {{ csrf_field() }}
                        <label class="sr-only" for="sp-search"></label>
                        <input class="form-control input-lg" name="search" id="sp-search" type="text" placeholder="Поиск">
                        <button type="submit"><i class="icon icon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
