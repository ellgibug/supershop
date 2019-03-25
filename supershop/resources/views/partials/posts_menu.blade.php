<aside class="sidebar right">

    {{--<!--Search Widget-->--}}
    {{--<div class="widget search">--}}
        {{--<h3>Поиск</h3>--}}
        {{--<form method="get" role="search">--}}
            {{--<label class="sr-only" for="blog-search"></label>--}}
            {{--<input class="form-control input-lg" name="blog-search" id="blog-search" type="text" placeholder="Поиск">--}}
            {{--<button type="submit"><i class="icon icon-search"></i></button>--}}
        {{--</form>--}}
    {{--</div>--}}
    <!--Categories-->
    <div class="widget categories">
        <h3>Товары</h3>
        <div class="space-top">
            @if(\count($products))
                @foreach($products as $product)
                    <a href="{{ route('posts.index', ['product' => $product->id]) }}" role="button" class="btn btn-outlined btn-sm btn-primary">{{ $product->name }}</a>
                @endforeach
            @endif
        </div>
    </div>

    <!--Categories-->
    <div class="widget categories">
        <h3>Авторы</h3>
        <div class="space-top">
            @if(\count($users))
                @foreach($users as $user)
                    <a href="{{ route('posts.index', ['author' => $user->id]) }}" role="button" class="btn btn-outlined btn-sm btn-primary">{{ $user->name }}</a>
                @endforeach
            @endif
        </div>
    </div>

    @auth
    <div class="space-top">
        <a href="{{ route('posts.create') }}" role="button" class="btn btn-md btn-block btn-warning">Новый пост</a>
    </div>
    @endauth
</aside>