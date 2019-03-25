<!--Off-Canvas Menu-->
<aside class="left-off-canvas-menu">
    <div class="mobile-navi">
        <form method="get" class="mobile-search">
            <label class="sr-only" for="m-search"></label>
            <input class="form-control input-lg" name="m-search" id="m-search" type="text" placeholder="Поиск">
            <button type="submit"><i class="icon icon-search"></i></button>
        </form>
        <ul class="buttons">
            <li><a href="{{ route('login') }}">Вход</a></li>
            <li><a href="{{ route('register') }}">Регистрация</a></li>
        </ul>
        <ul>
            @foreach($main_categories as $main_category)
                <li><a href="{{ $main_category->slug }}">{{ $main_category->name }}</a><span></span>
                    <ul class="submenu">
                        @foreach($main_category->categories as $category)
                            <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</aside><!--Off-Canvas Menu Close-->