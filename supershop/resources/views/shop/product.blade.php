@extends('layouts.master')
@section('title', $product->name)
@section('description', '')
@section('robots', 'all')

@section('content')
<div class="page">

    <div class="container space-top">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="{{ route('shop.index') }}">Главная</a></li>
                    <li><a href="{{ route('shop.main_category', ['main_category' => $product->category->mainCategory->slug]) }}">{{ $product->category->mainCategory->name }}</a></li>
                    <li><a href="{{ route('shop.category', ['main_category' => $product->category->mainCategory->slug, 'category' => $product->category->slug]) }}">{{ $product->category->name }}</a></li>
                </ol>
            </div>
        </div>
    </div>

    <section class="no-padding-bottom">
        <div class="container">
            <div class="row space-bottom">

                <div class="col-md-6 col-md-push-6 double-space-bottom">
                    <div class="sp-slider">
                        <div class="master-slider" id="spSlider">
                            @if(\count($product->images))
                                @foreach($product->images as $image)
                                    <div class="ms-slide">
                                        <img src="{{ asset('masterslider/blank.gif') }}" data-src="{{ asset($image->image) }}" alt="{{ $product->name }}"/>
                                        <img class="ms-thumb" src="{{ asset($image->image) }}" alt="{{ $product->name }}" />
                                    </div>
                                @endforeach
                            @else
                                <div class="ms-slide">
                                    <img src="{{ asset('masterslider/blank.gif') }}" data-src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}"/>
                                    <img class="ms-thumb" src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-pull-6">
                    <h1 class="product-name">{{ $product->name }}</h1>
                    <div class="block-devider">
                        <ul class="featured-list">
                            @if($product->label)
                                <li class="text-primary">{{ $product->label }}</li>
                            @endif
                            <li>Бренд: <a href="{{ route('brand', $product->brand->slug) }}">{{ $product->brand->name }}</a></li>
                            @foreach($product->filters as $filter)
                                <li>{{ $filter->name }}: {{ $filter->pivot->value }}{{ $filter->measure ? ', ('. $filter->measure.')' : '' }}</li>
                            @endforeach
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad animi aut blanditiis
                            consequatur cumque eaque, enim esse explicabo in magni, molestiae nulla pariatur, praesentium
                            quo quod saepe sint voluptatem?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad animi aut blanditiis
                            consequatur cumque eaque, enim esse explicabo in magni, molestiae nulla pariatur, praesentium
                            quo quod saepe sint voluptatem?</p>
                    </div>
                    <div class="block-devider sp-tools">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4>Цена</h4>
                                <div class="price">{{ \number_format($product->price,0,'', ' ') }} &#8381;</div>
                            </div>
                        </div>
                    </div>
                    <div class="post-toolbox">
                        <a class="add-cart btn btn-lg btn-primary" href="{{ route('cart.add', $product->id) }}"><i class="fa fa-plus left"></i>Добавить в корзину</a>
                        <div class="buttons">
                            <a class="add-wishlist" href="{{ route('wishlist.add', $product->id) }}">
                                <i class="fa fa-heart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-block double-space-bottom">
        <div class="container">

            <ul class="nav-tabs" role="tablist">
                <li class="active"><a href="#reviews" role="tab" data-toggle="tab"><span>01</span>Отзывы</a></li>
                <li><a href="#blogs" role="tab" data-toggle="tab"><span>02</span>Блоги</a></li>
            </ul>

            <div class="tab-content gray-bg">
                <div class="tab-pane fade in active" id="reviews">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="page-heading center">
                                    <h3>Отзывы<span></span></h3>
                                </div>
                                @if(Session::has('commentStoreMessage'))
                                    <div class="home-notification">
                                        <p>{{ Session::get('commentStoreMessage') }}</p>
                                    </div>
                                @endif
                                @forelse ($product->comments->where('display', 1)->sortByDesc('created_at') as $comment)
                                <div class="media space-bottom">
                                    <div class="media-body">
                                        <p class="mb-05">{{ $comment->body }}</p>
                                        <span class="text-muted">{{ $comment->user->name }} {{ $comment->created_at->formatLocalized('%d %B %Y') }}</span>
                                    </div>
                                </div>
                                @empty
                                    <p class="text-center">На данный товар пока нет отзывов :(</p>
                                    <p class="text-center"><a href="{{ route('login') }}">Войдите на сайт</a>, чтобы оставлять отзывы</p>
                                    @auth
                                    <p class="text-center">Ваш отзыв может стать первым!</p>
                                    @endauth
                                @endforelse

                                @auth
                                <div class="page-heading center double-space-top">
                                    <h3>Оставить отзыв<span></span></h3>
                                </div>
                                @include('errors.errors')
                                <form method="post" action="{{ route('comments.store') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="commentable_type" value="products">
                                    <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label class="sr-only" for="body"></label>
                                            <textarea class="form-control input-lg" name="body" id="body" rows="5" placeholder="Текст отзыва" required="" style="resize: none"></textarea>
                                        </div>
                                    </div>
                                    <input class="btn btn-md btn-primary btn-center" type="submit" value="Отправить">
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="blogs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="page-heading center">
                                    <h3>Упоминания в блогах<span></span></h3>
                                </div>
                                <div class="list-view">
                                    @forelse($product->posts->where('display', 1)->sortByDesc('created_at') as $post)
                                    <div class="row post space-bottom">
                                        <div class="col-md-4 col-sm-4">
                                            <a class="featured-img" href="{{ route('posts.show', $post->id) }}"><img src="{{ asset($post->images->first()->image) }}" alt="{{ $post->title }}"></a>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <h3>{{ $post->title }}</h3>
                                            @if(\count($post->products))
                                                @foreach($post->products as $product)
                                                    <a href="{{ route('posts.index', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                                @endforeach
                                            @else
                                            @endif
                                            <span class="devider"></span>
                                            <div class="meta group">
                                                <span class="text-muted">{{ $post->user->name }} {{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p class="text-center">Про данный товар записи не найдены :(</p>
                                        @auth
                                            <p class="text-center"><a href="{{ route('posts.create') }}">Вы можете написать что-нибудь про него сами!</a></p>
                                        @endauth
                                    @endforelse
                                </div>
                                <a class="btn btn-md btn-primary btn-center" href="{{ route('posts.index') }}">Читать все посты</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
