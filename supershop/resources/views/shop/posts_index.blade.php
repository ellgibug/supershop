@extends('layouts.master')
@section('title', 'блог пользователей')
@section('description', '')
@section('robots', 'all')

@section('content')
    <div class="page blog">

        <section class="hero-static fw-img-banner light-text double-space-bottom" style="background-image: url({{ asset('img/blog.jpg') }}); height: auto !important;">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-heading center">
                    <h2>Блог наших пользователей</h2>
                    <h3>Новости, обзоры, впечатления и всё всё всё о наших товарах! </h3>
                </div>
            </div>
        </section>

        <div class="container double-padding-bottom">
            <div class="row">
                <section class="col-md-8 list-view">

                    @if(Session::has('postsStoreMessage'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('postsStoreMessage') }}</p>
                    </div>
                    @endif

                    @forelse($posts as $post)
                    <div class="row post">

                        <div class="col-md-4 col-sm-4">
                            <a class="featured-img" href="{{ route('posts.show', $post->id) }}">
                                @if(\count($post->images))
                                <img src="{{ asset($post->images->first()->image) }}" alt="{{ $post->name }}"/>
                                @else
                                <img src="{{ asset('posts_images/no_img.jpg') }}" alt="{{ $post->name }}"/>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="meta group">
                                <div class="left">
                                    <h3>{{ $post->title }}</h3>
                                </div>
                                <div class="right">
                                    @auth
                                        @if(Auth::guard('web')->user()->id == $post->user_id)
                                        <a href="{{ route('posts.edit', $post->id) }}">
                                            <h3><i class="fa fa-pencil" aria-hidden="true"></i></h3>
                                        </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>

                            @if(\count($post->products))

                            @foreach($post->products as $product)
                                <a href="{{ route('posts.index', ['product' => $product->id]) }}" role="button" class="btn btn-outlined btn-sm btn-primary">{{ $product->name }}</a>
                            @endforeach

                            @endif

                            <span class="devider"></span>
                            <div class="meta group">
                                <div class="left">
                                    <a href="{{ route('posts.index', ['author' => $post->user->id]) }}">{{ $post->user->name }}</a>
                                </div>
                                <div class="right"><span class="text-muted">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span></div>
                            </div>
                            <div class="meta group">
                                <div class="left">
                                    <span class="text-muted">
                                        {{ \count($post->comments) ? 'Комментарии: ' . \count($post->comments) : 'Комментариев нет' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3>Постов пока нет:(</h3>
                    @auth
                    <h3>Ваш пост может стать первым!</h3>
                    <div class="space-top">
                        <a href="{{ route('posts.create') }}" role="button" class="btn btn-md btn-warning">Новый пост</a>
                    </div>
                    @endauth
                    @endforelse
                    {{ $posts->links() }}
                </section>

                <div class="col-md-4" id="sidebar">
                    @include('partials.posts_menu')
                </div>
            </div>
        </div>

        <a href="#sidebar" class="sidebar-button"><i class="fa fa-outdent"></i></a>
    </div>
@endsection
