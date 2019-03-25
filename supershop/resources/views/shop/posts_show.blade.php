@extends('layouts.master')
@section('title', $post->title)
@section('description', '')
@section('robots', 'all')

@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li><a href="{{ route('posts.index') }}">Блог</a></li>
                <li class="active">{{ $post->title }}</li>
            </ol>
        </div>

        <section class="container space-top double-space-bottom">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="post-title">{{ $post->title }}</h1>

                    <div class="space-bottom">
                        @if(\count($post->images))
                        <div class="master-slider ms-skin-default" id="postSlider">
                            @foreach($post->images as $image)
                            <div class="ms-slide">
                                <img src="{{ asset('masterslider/blank.gif') }}" data-src="{{ asset($image->image) }}" alt="{{ $post->name }}"/>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="gray-bg" style="margin-bottom: 20px; padding: 40px 20px !important;">
                        {!! $post->body !!}
                    </div>

                    <div class="post-meta">
                        <div class="taxonomy">
                            <a href="{{ route('posts.index', ['author' => $post->user->id]) }}">{{ $post->user->name }}</a>
                        </div>
                        <div class="date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</div>
                    </div>

                    @if(\count($post->products))
                    <div class="catalog-grid type-2 space-top">
                        <h2 class="post-title">Товары в блоге</h2>
                        @foreach($post->products as $product)
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <a class="thumb" href="{{ route('shop.product', ['main_category' => $product->category->mainCategory->slug, 'category' => $product->category->slug, 'product' => $product->slug]) }}">
                                    <span class="overlay"></span>
                                    @if(\count($product->images))
                                        <img src="{{ asset($product->images->first()->image) }}" alt="{{ $product->name }}"/>
                                    @else
                                        <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}"/>
                                    @endif

                                    <div class="description">
                                        <h3>{{ $product->name }}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="clearfix"></div>
                    @auth
                    <h2 class="post-title space-top">Комментарии</h2>
                        @include('errors.errors')
                        <form method="post" action="{{ route('comments.store') }}" class="space-bottom">
                            {{ csrf_field() }}
                            <input type="hidden" name="commentable_type" value="posts">
                            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label class="sr-only" for="body"></label>
                                    <textarea class="form-control input-lg" name="body" id="body" rows="5" placeholder="Текст комментария" required="" style="resize: none"></textarea>
                                </div>
                            </div>
                            <input class="btn btn-md btn-primary btn-center" type="submit" value="Отправить">
                        </form>
                    @endauth
                    @forelse($post->comments as $comment)
                        <div class="media space-bottom">
                            <div class="media-body">
                                <p class="mb-05">{{ $comment->body }}</p>
                                <span class="text-muted">
                                    {{ $post->user_id == $comment->user->id ? 'Автор' : $comment->user->name }}
                                    {{ $comment->created_at->formatLocalized('%d %B %Y') }}</span>
                            </div>
                        </div>
                    @empty
                        <p>Комментариев пока нет</p>
                    @endforelse
                </div>

                <div class="col-md-4 space-bottom" id="sidebar">
                    @include('partials.posts_menu')
                </div>
            </div>
        </section>

        <a href="#sidebar" class="sidebar-button"><i class="fa fa-outdent"></i></a>
    </div>
@endsection
