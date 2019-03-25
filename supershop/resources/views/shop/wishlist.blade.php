@extends('layouts.master')
@section('title', 'избранные товары')
@section('description', '')
@section('robots', 'none')

@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Лист желаний</li>
            </ol>
        </div>

        <div class="container">
            <div class="page-heading center">
                <h2>Я хочу</h2>
            </div>
            {{--<div class="clearfix send-wishlist"><a href="mailto:?subject=Link%20to%20my%20Wishlist&amp;body=Here%20is%20the%20link%20to%20my%20wishlist%20http://www.website.com" class="alt pull-right">Send the Wishlist by Email</a></div>--}}
            @if(Cart::instance('wishlist')->count())
            <div class="row catalog-grid type-2 space-bottom">
                @foreach($items as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="item" style="position: relative">
                        <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="post" class="pull-right" style="z-index: 1000; position: absolute; top:10px; right: 10px">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="delete-btn">X</button>
                        </form>
                        @if($item->model->label)
                            <span class="badge sale">{{ $item->model->label }}</span>
                        @endif
                        <a class="thumb" href="{{ route('shop.product', ['main_category' => $item->model->category->mainCategory->slug, 'category' => $item->model->category->slug, 'product' => $item->model->slug]) }}">
                            <span class="overlay"></span>
                            @if(\count($item->model->images))
                                <img src="{{ asset($item->model->images->first()->image) }}" alt="{{ $item->model->name }}">
                            @else
                                <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $item->model->name }}"/>
                            @endif
                            <div class="description">
                                <h3>{{ $item->model->name }}</h3>
                                    <p>Бренд: {{ $item->model->brand->name }}</p>
                                    @foreach($item->model->filters->take(2) as $filter)
                                        <p>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</p>
                                    @endforeach
                            </div>
                        </a>
                        <footer>
                            <div class="info"><span class="price">{{ \number_format($item->model->price,0,'', ' ') }} &#8381;</span></div>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h3 class="text-center">Я еще не знаю, чего я хочу :(<span></span></h3>
            @endif
        </div>
    </div>
@endsection
