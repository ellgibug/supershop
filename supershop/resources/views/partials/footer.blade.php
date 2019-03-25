<section class="info-box primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"><a class="btn btn-transparent btn-primary btn-block" href="{{ route('rules.index') }}">Правила</a></div>
            <div class="col-lg-3"><a class="btn btn-transparent btn-primary btn-block" href="#">Инструкция</a></div>
            <div class="col-lg-3"><a class="btn btn-transparent btn-primary btn-block" href="{{ route('login') }}">Личный кабинет</a></div>
            <div class="col-lg-3"><a class="btn btn-transparent btn-primary btn-block" href="#">Админ панель</a></div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row double-padding-bottom">

            <!--Featured Posts-->
            <div class="col-md-4 col-sm-4">
                @if(\count($posts))
                <h3>Блог наших пользователей</h3>
                @foreach($posts as $post)
                <div class="featured-post">
                    <h5><a href="#">{{ $post->title }}</a></h5>
                    <span class="devider"></span>
                    <div class="meta group">
                        <div class="left">
                            <a href="{{ route('posts.index', ['author' => $post->user->id]) }}">{{ $post->user->name }}</a>
                        </div>
                        <div class="right"><span class="text-muted">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span></div>
                    </div>
                </div>
                @endforeach
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Читать все посты</a>
                @endif
            </div>

            <!--Features-->
            <div class="col-md-4 col-sm-4">
                <div class="features">
                    <h3>Страницы</h3>
                    <h5><a href="{{ route('rules.index') }}">Правила работы сайта</a></h5>
                    <h5><a href="{{ route('dap.index') }}">Доставка, оплата, возврат</a></h5>
                    <h5><a href="#">Инструкция по использованию</a></h5>
                    <h5><a href="#">Карта сайта</a></h5>
                    <h5><a href="{{ route('contacts.index') }}">Контакты</a></h5>
                </div>
            </div>

            <!--Contact Info-->
            <div class="col-md-4 col-sm-4">
                <div class="contacts">
                    <h3>Контакты</h3>
                    <p>Адрес: г. Москва, ...</p>
                    <p>Телефон: 8 (499) 123 45 67</p>
                    <p>E-mail: <a href="mailto:info@your-domain.com">info@your-domain.com</a></p>
                    <a href="{{ route('shop.index') }}"><img src="{{ asset('img/logo.svg') }}" alt="SuperShop" style="margin-left: -30px"/></a>
                </div>
            </div>
        </div>
    </div>

    <!--Copyright-->
    <div class="copyright">
        <div class="container">
            <small>Это тестовый прототип интернет магазина. Вся информация о товарах, брендах, изображения используются в демонстрационных целях. Вы НЕ можете здесь ничего купить.</small>
            <small>Вы можете пользоваться сайтом как указано в <a href="">правилах</a>. Все возможности сайта описаны в <a href="">инструкции</a>.</small>
            <small>Если у Вас есть какие-либо вопросы, преложения или иные замечания, то просьба оставить их через <a href="">контактную форму</a>.</small>
            <small>Сайт использует данные Вашего местоположения и файлы cookie. Оставаясь на сайте, Вы подтверждаете, что ознакомлены с его правилами. </small>
        </div>
    </div>
</footer>