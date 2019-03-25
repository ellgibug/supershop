<header class="header sticky"><!--Adding class "sticky" to header enables its pinning to top on scroll. Please note in a "boxed" mode header doesn't stick to the top.-->
    <div class="inner">
        <div class="container group">

            <!--Logo-->
            <a class="logo" href="{{ route('shop.index') }}"><img src="{{ asset('img/logo.svg') }}" alt="SuperShop"/></a>

            <!--Navigation Toggle-->
            <div class="left-off-canvas-toggle" id="nav-toggle">
                <span></span>
            </div>

            <!--Site Navigation-->
            <div class="navigation">
                <!--Menu-->
                <nav class="menu">
                    <ul>
                        @foreach($main_categories as $main_category)
                            <li class="has-mega-menu"><a href="{{ route('shop.main_category', ['main_category' => $main_category->slug]) }}">{{ $main_category->name }}</a>
                                <div class="mega-menu bg-white">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3">
                                                <h4>{{ $main_category->name }}</h4>
                                                <ul>
                                                    @foreach($main_category->categories as $category)
                                                        <li class="has-submenu active"><a href="{{ route('shop.category', ['main_category' => $main_category->slug, 'category' => $category->slug]) }}" data-target="#big-banner">{{ $category->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <!--Big Banner-->
                                            <div class="mega-submenu col-md-10 col-sm-9 active" id="big-banner">
                                                <a class="img-link" href="{{ route('shop.main_category', ['main_category' => $main_category->slug]) }}"><img src="{{ asset($main_category->image) }}" alt="{{ $main_category->name }}"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <!--Search-->
                <div class="search"><i class="icon icon-search"></i></div>
            </div>

            <!--Tools-->
            <div class="tools group">
                @guest
                    <a class="signup pull-left" href="{{ route('login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                @endguest
                @auth
                    <a class="signup pull-left" href="{{ route('home.index') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                @endauth
                <a class="signup pull-left" href="{{ route('wishlist.index') }}">
                    <i class="fa fa-heart-o"></i>
                    <span class="countOfWishlistItems">{{ \count(Cart::instance('wishlist')->content())  }}</span>
                </a>
                <a class="signup pull-left" href="{{ route('cart.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="countOfCartItems">{{ Cart::instance('cart')->count() }}</span>
                </a>
            </div><!--Tools Close-->
        </div>
    </div>

    <!--Quick Search-->
    <form class="quick-search" method="get" autocomplete="off" action="{{ route('search') }}">
        <div class="overlay"></div>
        {{ csrf_field() }}
        <input class="search-field" type="text" placeholder="Поиск" name="search">
        <span>Нажмите "ввод" для начала поиска</span>
    </form>

</header>