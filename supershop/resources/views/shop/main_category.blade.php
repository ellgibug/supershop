@extends('layouts.master')
@section('title', $main_category->name)
@section('description', '')
@section('robots', 'all')

@section('content')
<div class="page">

    <div style="position: relative;" class="container space-top group sorting">
        <ol class="breadcrumb">
            <li><a href="{{ route('shop.index') }}">Главная</a></li>
            <li class="active">{{ $main_category->name }}</li>
        </ol>
    </div>

    <section class="page-block double-padding-top">
        <div class="container">
            <div class="page-heading center">
                <h2>{{ $main_category->name }}</h2>
            </div>
            <div class="row">
                @foreach($main_category->categories as $category)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="thumbnail-3d">
                        <div class="inner">
                            <a href="{{ route('shop.category', ['main_category' => $main_category->slug, 'category' => $category->slug]) }}">
                                @if(\count($category->products()->inRandomOrder()->first()->images))
                                <img src="{{ asset($category->products()->inRandomOrder()->first()->images->first()->image) }}" alt="{{ $category->name }}"/>
                                @else
                                <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $category->name }}"/>
                                @endif
                            </a>
                        </div>
                    </div>
                    <p><a href="{{ route('shop.category', ['main_category' => $main_category->slug, 'category' => $category->slug]) }}">{{ $category->name }}</a> ({{ \count($category->products) }})</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
