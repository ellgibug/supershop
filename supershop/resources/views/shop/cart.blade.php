@extends('layouts.master')
@section('title', 'корзина')
@section('description', '')
@section('robots', 'none')

@section('content')
<div class="page">

    <div class="container space-top">
        <ol class="breadcrumb">
            <li><a href="{{ route('shop.index') }}">Главная</a></li>
            <li class="active">Моя корзина</li>
        </ol>
    </div>

    <div class="container">
        <div class="page-heading center">
            <h2>Мои покупки</h2>
        </div>
        @if(Cart::instance('cart')->count())
        <div class="row">

            <section class="col-md-9 shopping-cart">
                <header>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-5 col-xs-5"><h4>Товар</h4></div>
                            </div>
                        </div>
                        <div class="col-xs-3 hidden-xs"><h4>Количество</h4></div>
                        <div class="col-sm-3 col-xs-6"><h4>Цена</h4></div>
                    </div>
                </header>
                @foreach($items as $item)
                <div class="item" id="{{ $item->rowId }}">
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post" class="pull-right">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="delete-btn">X</button>
                    </form>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 group">
                            <a class="thumb" href="{{ route('shop.product', ['main_category' => $item->model->category->mainCategory->slug, 'category' => $item->model->category->slug, 'product' => $item->model->slug]) }}">
                                @if(\count($item->model->images))
                                    <img src="{{ asset($item->model->images->first()->image) }}" alt="{{ $item->model->name }}" style="height: 80px">
                                @else
                                    <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $item->model->name }}" style="height: 80px">
                                @endif

                            </a>
                            <div class="details">
                                <p>
                                    <a href="{{ route('shop.product', ['main_category' => $item->model->category->mainCategory->slug, 'category' => $item->model->category->slug, 'product' => $item->model->slug]) }}">
                                        {{ $item->model->name }}
                                    </a>
                                </p>
                                <small>
                                    Другие товары в <a href="{{ route('shop.category', ['main_category' => $item->model->category->mainCategory->slug, 'category' => $item->model->category->slug]) }}">данной категории</a>

                                </small>
                            </div>
                        </div>
                        <div class="col-xs-3 hidden-xs">
                            <div class="qnt-count">
                                <form action="{{ route('cart.update', $item->rowId) }}">
                                    <a class="incr-btn incr-btn-cart fa fa-angle-left" data-action="decrease" href="#"></a>
                                    <input class="quantity quantity-cart" type="text" value="{{ $item->qty }}">
                                    <a class="incr-btn incr-btn-cart fa fa-angle-right" data-action="increase" href="#"></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="price {{ $item->rowId }}"><span>{{ \number_format($item->model->price * $item->qty,0,'', ' ') }}</span> &#8381;</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>

            <div class="col-md-3">
                <aside class="sidebar right no-devider center-block">
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
                    <div class="widget">
                        <a class="btn btn-md btn-primary btn-block" href="{{ route('checkout.index') }}">Оформить заказ</a>
                    </div>
                </aside>
            </div>

        </div>
        @else
        <h3 class="text-center">Вы еще ничего не выбрали :(<span></span></h3>
        @endif
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
