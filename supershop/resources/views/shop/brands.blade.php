@extends('layouts.master')
@section('title', 'бренды')
@section('description', '')
@section('robots', 'all')

@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Бренды</li>
            </ol>
        </div>

        <div class="container">
            @foreach($first_letters as $first_letter)
            <h2 class="post-title space-top">{{ $first_letter }}</h2>
            <div class="row">
                @foreach($brands as $brand)
                    @if($first_letter == \mb_substr($brand->name, 0, 1, "utf-8"))
                        <div class="col-lg-3">
                            <a href="{{ route('brand', $brand->slug) }}">
                                <div class="thumbnail-3d">
                                    <img src="{{ $brand->image_small }}" alt="{{ $brand->name }}"/>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
@endsection
