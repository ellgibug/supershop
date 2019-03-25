@extends('layouts.master')
@section('title', 'оформление заказа')
@section('description', '')
@section('robots', 'none')

@section('content')
<div class="page">

    <div class="container space-top">
        <ol class="breadcrumb">
            <li><a href="{{ route('shop.index') }}">Главная</a></li>
            <li><a href="{{ route('cart.index') }}">Моя корзина</a></li>
            <li class="active">Оформление заказа</li>
        </ol>
    </div>

    <div class="container">
        <div class="page-heading center">
            <h2>Оформление заказа</h2>
        </div>

        @include('errors.errors')
        <div class="error-container d-none" id="ajax_error_container"></div>

        @auth
        <form class="row" method="post"  action="{{ route('orders.store') }}">
            {{ csrf_field() }}
            <div class="col-md-4 col-md-push-3">
                <h3 class="heading center">Информация о доставке<span></span></h3>

                <p>Получатель: {{ Auth()->guard('web')->user()->name }} {{ Auth()->guard('web')->user()->surname }}</p>
                <p>Телефон: {{ Auth()->guard('web')->user()->phone }}</p>
                <p>E-mail: {{ Auth()->guard('web')->user()->email }}</p>
                <div class="form-group">
                    <label for="address" class="sr-only">Адрес</label>
                    <textarea class="form-control" name="address" id="address" rows="4" placeholder="Адрес*" required style="resize: none">{{ Auth()->guard('web')->user()->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="zip" class="sr-only">Индекс</label>
                    <input class="form-control" type="text" name="zip" id="zip" placeholder="Индекс*" value="{{ Auth()->guard('web')->user()->zip }}" required>
                </div>
                <p class="p-sm"><span class="text-primary p-lg">*</span> Обязательные поля</p>
                <div class="form-group">
                    <label for="address" class="sr-only">Адрес</label>
                    <textarea class="form-control" name="users_comment" id="users_comment" rows="4" placeholder="Комментарий к заказу (опционально)" style="resize: none"></textarea>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-4">
                <h3 class="heading center">В заказе<span></span></h3>
                <aside class="sidebar left no-devider center-block space-top">
                    <div class="widget cart-totals">
                        <h3>К оплате</h3>
                        <table>
                            <tr>
                                <td>Сумма покупок</td>
                                <td class="text-right">
                                    <span class="cart-total-before">
                                        {{ Cart::instance('cart')->subtotal(0, '', ' ') }}
                                    </span>
                                    &#8381;
                                </td>
                            </tr>
                            <tr>
                                <td>Доставка курьером</td>
                                <td class="text-right">
                                    <span class="cart-delivery-price">
                                        @if(\str_replace(" ","",Cart::instance('cart')->subtotal()) < 2000)
                                            {{ config('constants.delivery_price') }}
                                        @else
                                            0
                                        @endif
                                    </span>
                                    &#8381;
                                </td>
                            </tr>
                            <tr>
                                <td>Самовывоз</td>
                                <td class="text-right">
                                    0 &#8381;
                                </td>
                            </tr>
                        </table>
                        <table class="total">
                            <tr>
                                <td>Итого <br><small>(самовывоз)</small></td>
                                <td class="text-right">
                                    <span class="cart-total-before">
                                        {{ Cart::instance('cart')->subtotal(0, '', ' ') }}
                                    </span>
                                    &#8381;
                                </td>
                            </tr>
                            <tr>
                                <td>Итого <br><small>(доставка)</small></td>
                                <td class="text-right">
                                    <span class="cart-total-after">
                                        @if(\str_replace(" ","",Cart::instance('cart')->subtotal()) < 2000)
                                            {{ \number_format(\str_replace(" ","",Cart::instance('cart')->subtotal()) + config('constants.delivery_price'),0,'', ' ') }}
                                        @else
                                            {{ Cart::instance('cart')->subtotal(0, '', ' ') }}
                                        @endif
                                    </span>
                                    &#8381;
                                </td>
                            </tr>
                        </table>
                    </div>
                    <a class="btn btn-primary btn-center" href="{{ route('cart.index') }}">Изменить заказ</a>
                </aside>
            </div>

            <div class="col-md-5">
                <h3 class="heading center">Способ доставки<span></span></h3>
                <div class="info-tile-radio space-top">
                    <div class="tile">
                        <input type="radio" name="delivery_type" value="1" id="delivery_type_0" checked>
                        <label>Самовывоз<span class="pricing">БЕСПЛАТНО</span></label>
                    </div>
                    <div class="tile">
                        <input type="radio" name="delivery_type" value="2" id="delivery_type_1">
                        <label>Курьером
                            <span class="pricing">
                                @if(\str_replace(" ","",Cart::instance('cart')->subtotal()) < 2000)
                                    {{ config('constants.delivery_price') }} &#8381;
                                @else
                                    БЕСПЛАТНО
                                @endif
                            </span>
                        </label>
                    </div>
                </div>
                <p class="p-sm text-center">Вы можете получить товар со склада в день заказа.<br>
                Курьер доставит Вам товар в течение 1-3 дней.</p>
                <h3 class="heading center space-top">Способ оплаты<span></span></h3>
                <div class="info-tile-radio space-top">
                    <div class="tile">
                        <input type="radio" name="payment_type" value="1" id="payment_type_0" checked>
                        <label>Оплата онлайн<span class="pricing">КАРТОЙ</span></label>
                    </div>
                    <div class="tile">
                        <input type="radio" name="payment_type" value="2" id="payment_type_1">
                        <label>Оплата <span class="pricing">НАЛИЧНЫМИ</span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-center mt-1">Подтвердить заказ</button>
            </div>
        </form>
        @endauth

        @guest
        <div class="text-center">
            <h3>Заказы через сайт доступны только зарегистрированным пользователям.</h3>
            <p><a href="{{ route('login') }}">Войдите в личный кабинет</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, если Вы у нас в первый раз :)<br>Это займет не более минуты</p>
        </div>
        @endguest

    </div>

    <section class="info-box primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><h3 class="light-weight light-color">Бесплатная доставка от 2 000 рублей!</h3></div>
            </div>
        </div>
    </section>

</div>
@endsection
