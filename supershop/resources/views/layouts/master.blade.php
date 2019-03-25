<!doctype html>
<!--Conditionals for IE8-9 Support-->
<!--[if IE]><html lang="ru" class="ie"><![endif]-->
<html>
<head>
    @include('partials.head')
    @yield('styles')
    <style>
        .delete-btn{
            background: none;
            border: none;
            text-decoration: none;
            font-size: 20px;
            margin: 0;
            padding: 0;
        }
        .delete-btn:hover{
            text-decoration: none;
        }
        .home-notification{
            padding: 16px 15px;
            background: white;
            margin-bottom: 20px;
            border-radius: 5px
        }
        .home-notification p{
            margin-bottom: 0px;
        }
        .error-container{
            padding: 16px;
            background: rgba(204, 51, 51, 0.1);
            margin: 20px 0;
            border-radius: 5px;
            border: 2px solid #cc3333;
        }
        .error-container p{
            margin-bottom: 0px;
            color: #cc3333;
        }
        .mt-5{
            margin-top: 5em !important;
            display: block !important;
        }
        .mt-3{
            margin-top: 3em !important;
            display: block !important;
        }
        .mt-1{
            margin-top: 1em !important;
            display: block !important;
        }
        .mb-0{
            margin-bottom: 0 !important;
            display: block !important;
        }
        .mb-1{
            margin-bottom: 1em !important;
            display: block !important;
        }
        .mb-3{
            margin-bottom: 3em !important;
            display: block !important;
        }
        .mb-05{
            margin-bottom: 0.5em !important;
            display: block !important;
        }
        .d-none{
            display: none !important;
        }
        .d-block{
            display: block !important;
        }
        a.btn{
            margin-bottom: 10px !important;
        }
        .bg-white{
            background-color: white !important;
        }
        .header-toolbar .container small, .copyright .container small{
            font-size: 12px;
            line-height: 10px !important;
            text-align: justify;
        }
    </style>
</head>

<body class="parallax animated fadeIn">

<div style="position: fixed; z-index: 9999; top: 40%; width: 100%">
    <p style="font-size: 50px; color: rgba(255, 0, 0, 0.5); text-align: center; font-weight: 400">Внимание!!!<br>Сайт находится в разработке</p>
</div>

<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">

        @include('partials.left_menu')

        <div class="site-layout">

            @include('partials.header_toolbar')
            @include('partials.header')
            @yield('content')
            @include('partials.footer')

            <!-- Modal ajax?-->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Уведомление корзины</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="productName"></span> успешно добавлен в корзину
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Продолжить покупки</button>
                            <a href="{{ route('cart.index') }}" type="button" class="btn btn-secondary" style="margin-bottom: 0 !important;">Перейти в корзину</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="exit-off-canvas"></a>
    </div>
</div>

@include('partials.sticky_buttons')

@include('partials.scripts')
@yield('scripts')
</body>
</html>