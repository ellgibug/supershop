@extends('layouts.master')
@section('title', $category->name)
@section('description', '')
@section('robots', 'all')
@section('styles')

@endsection
@section('content')
{{--<div class="page">--}}

    {{--<!--Toolbox-->--}}
    {{--<div class="toolbox">--}}
        {{--<div class="container">--}}
            {{--<div class="heading">--}}
                {{--<button class="back-btn" onclick="goBack()"><i class="fa fa-angle-left"></i></button>--}}
                {{--<h1>{{ $category->name }}</h1>--}}
            {{--</div>--}}
            {{--<div class="layout-view">--}}
                {{--<a class="grid" href="shop-grid-1-sl.html"><span></span><span></span></a>--}}
                {{--<a class="list active" href="#"><span></span><span></span><span></span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--Toolbox Close-->--}}

    {{--<!--Breadcrumbs-->--}}
    {{--<div style="position: relative;" class="container space-top group sorting">--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="{{ route('shop.index') }}">Главная</a></li>--}}
            {{--<li><a href="{{ route('shop.main_category', $category->mainCategory->slug) }}">{{ $category->mainCategory->name }}</a></li>--}}
            {{--<li class="active">{{ $category->name }}</li>--}}
        {{--</ol>--}}
        {{--<ol class="sort">--}}
            {{--<li>Сортировать по цене</li>--}}
            {{--<li class="active"><a href="#">По возрастанию </a></li>--}}
            {{--<li><a href="#">По убыванию</a></li>--}}
        {{--</ol>--}}
    {{--</div><!--Breadcrumbs Close-->--}}

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="row">--}}
                {{--<!--Item-->--}}
                {{--@foreach($products as $product)--}}
                {{--<div class="col-md-4 col-sm-6">--}}
                    {{--<div class="item">--}}
                        {{--<a class="thumb" href="{{ route('shop.product', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'product' => $product->slug]) }}">--}}
                            {{--<span class="overlay"></span>--}}
                            {{--<img src="{{ $product->images->first()->image }}" alt="{{ $product->name }}" height="360px">--}}
                            {{--<img src="/img/demo/360x360.png" alt="{{ $product->name }}" height="360px">--}}
                            {{--<div class="description">--}}
                                {{--<h3>{{ $product->name }}</h3>--}}
                                {{--<ul class="featured-list">--}}
                                    {{--@if($product->label)--}}
                                        {{--<li class="text-primary">{{ $product->label }}</li>--}}
                                    {{--@endif--}}
                                    {{--<li>Бренд: {{ $product->brand->name }}</li>--}}
                                    {{--@foreach($product->filters->take(2) as $filter)--}}
                                        {{--<li>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<footer>--}}
                            {{--<div class="info">--}}
                                {{--<h3>{{ $product->name }}</h3>--}}
                                {{--<span class="price">{{ \number_format($product->price,0,'', ' ') }} &#8381;</span>--}}
                            {{--</div>--}}
                        {{--</footer>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--<!--Item-->--}}


                {{--<!-- Optional: clear the SM cols if their content doesn't match in height -->--}}
                {{--<div class="clearfix visible-sm-block"></div>--}}



                {{--<!-- Optional: clear the MD cols if their content doesn't match in height -->--}}
                {{--<div class="clearfix visible-md-block"></div>--}}



                {{--<!-- Optional: clear the SM cols if their content doesn't match in height -->--}}
                {{--<div class="clearfix visible-sm-block"></div>--}}


            {{--</div>--}}

            {{--<!--Catalog List-->--}}
            {{--<section class="col-md-12 catalog-list">--}}
                {{--@foreach($products as $product)--}}
                {{--<!--Item-->--}}
                {{--<div class="item">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                            {{--<a class="thumb" href="{{ route('shop.product', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'product' => $product->slug]) }}">--}}
                                {{--<img src="{{ $product->images->first()->image }}" alt="{{ $product->name }}" />--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<h5><a href="{{ route('shop.product', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'product' => $product->slug]) }}">{{ $product->name }}</a></h5>--}}
                            {{--<footer>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-4 col-sm-5">--}}
                                        {{--<span class="price">{{ \number_format($product->price,0,'', ' ') }} &#8381;</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-8 col-sm-7">--}}
                                        {{--<ul class="featured-list">--}}
                                            {{--@if($product->label)--}}
                                            {{--<li class="text-primary">{{ $product->label }}</li>--}}
                                            {{--@endif--}}
                                            {{--<li>Бренд: <a href="#">{{ $product->brand->name }}</a></li>--}}
                                            {{--@foreach($product->filters as $filter)--}}
                                                {{--<li>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="tools">--}}
                                    {{--<a class="add-cart" href="{{ route('cart.add', $product->id) }}">--}}
                                        {{--<i class="fa fa-plus"></i>&nbsp;&nbsp;В корзину--}}
                                    {{--</a>--}}
                                    {{--<a class="add-wishlist" href="{{ route('wishlist.add', $product->id) }}">--}}
                                        {{--<i class="fa fa-heart"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</footer>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}

                {{--{{ $products->links() }}--}}

            {{--</section><!--Catalog List Close-->--}}

            {{--<!--Sidebar-->--}}
            {{--<div class="col-md-3 col-md-pull-9 space-bottom" id="sidebar">--}}
                {{--<aside class="sidebar left no-devider">--}}
                    {{--<form action="{{ route('shop.category', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug]) }}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<h4>Фильтры</h4>--}}
                    {{--<!--Brand Filters-->--}}
                    {{--<div class="widget shop-filters">--}}
                        {{--<h6 class="filter-header">Бренд</h6>--}}
                        {{--<span class="clear clearChecks">Очистить</span>--}}
                        {{--@foreach($brands as $brand)--}}
                        {{--<div class="checkbox">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox" name="brands[]" value="{{ $brand->id }}" id="brand_{{ $brand->id }}"> {{ $brand->name }}--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}

                    {{--<!--Price Slider-->--}}
                    {{--<div class="widget shop-filters">--}}
                        {{--<h6 class="filter-header">Цена</h6>--}}
                        {{--<div class="row no-gutters mt-5">--}}
                            {{--<div class="col-xs-6">--}}
                                {{--от: <input class="form-control" type="text" value="{{ $min_price }}" name="min_price">--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-6">--}}
                                {{--до: <input class="form-control" type="text" value="{{ $max_price }}" name="max_price">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--@foreach($category->filters  as $filter)--}}
                        {{--<div class="widget shop-filters">--}}
                            {{--<h6 class="filter-header">{{ $filter->name }}{{ $filter->measure ? ', '. $filter->measure : '' }} </h6>--}}
                            {{--@php--}}
                                {{--$values = collect();--}}
                            {{--@endphp--}}
                            {{--@foreach($filter->products as $item)--}}
                                {{--@php--}}
                                    {{--$values = $values->push($item->pivot->value);--}}
                                {{--@endphp--}}
                            {{--@endforeach--}}
                            {{--@php--}}
                                {{--$min_value = $values->min();--}}
                                {{--$max_value = $values->max();--}}
                            {{--@endphp--}}
                            {{--@if($filter->type == 'num')--}}
                                {{--<div class="row no-gutters mt-5">--}}
                                    {{--<div class="col-xs-6">--}}
                                        {{--от: <input class="form-control" type="text" value="{{ $min_value }}" name="min_{{ $filter->id }}">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-6">--}}
                                        {{--до: <input class="form-control" type="text" value="{{ $max_value }}" name="max_{{ $filter->id }}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                            {{--@if($filter->type == 'str' || $filter->type == 'bool')--}}
                                {{--@foreach($values->unique() as $value)--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="bool_{{ $filter->id }}s[]" value="{{ $value }}">--}}
                                            {{--{{ $value }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<br>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<button type="submit" class="btn btn-outlined btn-primary btn-block mb-15">Применить</button>--}}
                    {{--<a href="{{ route('shop.category', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug]) }}" role="button" class="btn btn-outlined btn-default2 btn-block">Очистить</a>--}}
                    {{--</form>--}}
                {{--</aside>--}}
            {{--</div><!--Sidebar Close-->--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<!--Helpful Info Block-->--}}
    {{--<section class="page-block gray-bg double-padding-bottom space-top">--}}
        {{--<div class="container">--}}
            {{--<div class="page-heading center">--}}
                {{--<h2>Helpful Information</h2>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                    {{--<h4 class="bold-weight">Get to know how to care for your new handbag</h4>--}}
                    {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>--}}
                    {{--<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.</p>--}}
                    {{--<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                    {{--<div class="row icon-block">--}}
                        {{--<div class="col-lg-2 col-md-2 col-sm-2 featured-icon center"><i class="icon icon-iron-1"></i></div>--}}
                        {{--<div class="col-md-10 col-sm-10">--}}
                            {{--<h5><a href="#">Iron handbag carefully</a></h5>--}}
                            {{--<p class="small">Lorem aute irure dolor elit, sed nulla amet dolor do eiusmod tempor ut labore et dolore magna lorem nulla.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row icon-block">--}}
                        {{--<div class="col-lg-2 col-md-2 col-sm-2 featured-icon center"><i class="icon icon-no-spin"></i></div>--}}
                        {{--<div class="col-md-10 col-sm-10">--}}
                            {{--<h5><a href="#">No spinning allowed during washing</a></h5>--}}
                            {{--<p class="small">Lorem aute irure dolor elit, sed nulla amet dolor do eiusmod tempor ut labore et dolore magna lorem nulla.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row icon-block">--}}
                        {{--<div class="col-lg-2 col-md-2 col-sm-2 featured-icon center"><i class="icon icon-handwashing"></i></div>--}}
                        {{--<div class="col-md-10 col-sm-10">--}}
                            {{--<h5><a href="#">Handwashing is the best option</a></h5>--}}
                            {{--<p class="small">Lorem aute irure dolor elit, sed nulla amet dolor do eiusmod tempor ut labore et dolore magna lorem nulla.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section><!--Helpful Info Block Close-->--}}

    {{--<!--Info Box Widget-->--}}
    {{--<section class="info-box primary">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-8"><h3 class="light-weight light-color">Create the site you will be proud of with Kedavra HTML!</h3></div>--}}
                {{--<div class="col-lg-4"><a class="btn btn-transparent btn-primary" href="#">Buy Kedavra</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section><!--Info Box Widget Close-->--}}

    {{--<!--Sidebar Toggle-->--}}
    {{--<a href="#sidebar" class="sidebar-button"><i class="fa fa-outdent"></i></a>--}}

{{--</div>--}}
<!--Page Content Close-->

<div class="page">

    <div class="toolbox">
        <div class="container">
            <div class="heading">
                <button class="back-btn" onclick="goBack()"><i class="fa fa-angle-left"></i></button>
                <h1>{{ $category->name }}</h1>
            </div>
        </div>
    </div>

    <div style="position: relative;" class="container space-top group sorting">
        <ol class="breadcrumb">
            <li><a href="{{ route('shop.index') }}">Главная</a></li>
            <li><a href="{{ route('shop.main_category', $category->mainCategory->slug) }}">{{ $category->mainCategory->name }}</a></li>
            <li class="active">{{ $category->name }}</li>
        </ol>
        <ol class="sort">
            <li>Сортировать по цене</li>
            <li class="{{ request()->get('price') == 'asc' ? 'active' : '' }}"><a href="{{ route('shop.category', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'price' => 'asc']) }}">По возрастанию </a></li>
            <li class="{{ request()->get('price') == 'desc' ? 'active' : '' }}"><a href="{{ route('shop.category', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'price' => 'desc']) }}">По убыванию</a></li>
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
                        <a class="thumb" href="{{ route('shop.product', ['main_category' => $category->mainCategory->slug, 'category' => $category->slug, 'product' => $product->slug]) }}">
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
