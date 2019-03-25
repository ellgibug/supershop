<h3 class="heading center">Меню<span></span></h3>
<ul class="nav-tabs vertical">
    <li class="{{ Route::currentRouteName() == 'home.index' ? 'active' : ''}}">
        <a href="{{ route('home.index') }}">Мой аккаунт<span class="line"></span></a>
    </li>
    <li class="{{ Route::currentRouteName() == 'home.orders' ? 'active' : ''}}">
        <a href="{{ route('home.orders') }}">Мои заказы<span class="line"></span></a>
    </li>
    <li>
        <a href="{{ route('posts.index', ['author' => Auth::guard('web')->user()->id]) }}">Мой блог<span class="line"></span></a>
    </li>
    <li class="{{ Route::currentRouteName() == 'home.reviews' ? 'active' : ''}}">
        <a href="{{ route('home.reviews') }}">Мои отзывы<span class="line"></span></a>
    </li>
    <li class="{{ Route::currentRouteName() == 'home.notifications' ? 'active' : ''}}">
        <a href="{{ route('home.notifications') }}">Уведомления<span class="line"></span></a>
    </li>
    <li class="{{ Route::currentRouteName() == 'home.votes' ? 'active' : ''}}">
        <a href="{{ route('home.votes') }}">Голосование<span class="line"></span></a>
    </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
    {{ csrf_field() }}
    <button type="submit" class="btn-outlined btn-md btn-primary" style="margin-left: 20px !important;">Выйти</button>
</form>
