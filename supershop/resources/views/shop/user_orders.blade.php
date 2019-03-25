@extends('layouts.master')
@section('title', 'мои заказы')
@section('description', '')
@section('robots', 'none')

@section('content')
    <div class="page">

        <section class="page-block user-account double-space-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 navigation">
                        @include('partials.user_menu')
                    </div>

                    <div class="col-md-9 gray-bg">
                        <h3 class="heading center">Заказы<span></span></h3>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                @if(Session::has('orderStoreMessage'))
                                <div class="home-notification">
                                    <p>{{ Session::get('orderStoreMessage') }}</p>
                                </div>
                                @endif

                                @foreach($orders as $order)
                                <div class="panel static {{ $order->payment_status == 1 && $order->delivery_status == 5 ? 'panel-default' : 'panel-primary'}}">
                                    <div class="panel-heading">
                                        <h4 class="panel-title pull-left">Заказ №{{ $order->number }}</h4>
                                        <h4 class="panel-title pull-right">{{ $order->created_at->formatLocalized('%d %B %Y') }}</h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body" style="background: white !important;">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <p><strong>Товары в заказе</strong></p>
                                                @foreach($order->products as $product)
                                                    <div class="media">
                                                        <a class="pull-left" href="{{ route('shop.product', ['main_category' => $product->category->mainCategory->slug, 'category' => $product->category->slug, 'product' => $product->slug]) }}">
                                                            @if(\count($product->images))
                                                                <img class="media-object" src="{{ asset($product->images->first()->image) }}" alt="{{ $product->name }}" width="60px">
                                                            @else
                                                                <img src="{{ asset('products_images/no_img.jpg') }}" alt="{{ $product->name }}" width="60px"/>
                                                            @endif
                                                        </a>
                                                        <div class="media-body">
                                                            <small><strong>{{ $product->name }}</strong></small>
                                                            <br>
                                                            <small>{{ $product->pivot->qty }} шт - {{ \number_format($product->pivot->qty * $product->price,0,'', ' ') }} &#8381;</small>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <p><strong>Информация об оплате и доставке</strong></p>
                                                <dl class="row">
                                                    <dt class="col-sm-6">Способ оплаты</dt>
                                                    <dd class="col-sm-6">
                                                        @switch($order->payment_type)
                                                            @case(1)
                                                            Онлайн по карте
                                                            @break

                                                            @case(2)
                                                            Наличными
                                                            @break

                                                            @default
                                                            -
                                                            @break
                                                        @endswitch
                                                    </dd>

                                                    <dt class="col-sm-6">Способ доставки</dt>
                                                    <dd class="col-sm-6">
                                                        @switch($order->delivery_type)
                                                            @case(1)
                                                            Самовывоз
                                                            @break

                                                            @case(2)
                                                            Курьер
                                                            @break

                                                            @default
                                                            -
                                                            @break
                                                        @endswitch
                                                    </dd>

                                                    <dt class="col-sm-6">Статус оплаты</dt>
                                                    <dd class="col-sm-6">
                                                        @switch($order->payment_status)
                                                            @case(1)
                                                            Оплачено
                                                            @break

                                                            @case(0)
                                                            Не оплачено
                                                            @break

                                                            @default
                                                            -
                                                            @break
                                                        @endswitch
                                                    </dd>

                                                    <dt class="col-sm-6">Статус доставки</dt>
                                                    <dd class="col-sm-6">
                                                        @switch($order->delivery_status)
                                                            @case(1)
                                                            Принят
                                                            @break

                                                            @case(2)
                                                            Собирается
                                                            @break

                                                            @case(3)
                                                            Передан курьеру
                                                            @break

                                                            @case(4)
                                                            Доставляется
                                                            @break

                                                            @case(5)
                                                            Доставлен
                                                            @break

                                                            @default
                                                            -
                                                            @break
                                                        @endswitch
                                                    </dd>

                                                    <dt class="col-sm-6">Применен купон</dt>
                                                    <dd class="col-sm-6">
                                                        @if($order->coupon)
                                                            Да
                                                        @else
                                                            Нет
                                                        @endif
                                                    </dd>

                                                    <dt class="col-sm-6">Скидка</dt>
                                                    <dd class="col-sm-6">{{ \number_format($order->total_after - $order->total_before,0,'', ' ') }} &#8381;</dd>

                                                    <dt class="col-sm-6">Оплачено</dt>
                                                    <dd class="col-sm-6">{{ \number_format($order->total_after,0,'', ' ') }} &#8381;</dd>

                                                </dl>

                                                @if($order->delivery_type == 2)
                                                    <p><strong>Адрес доставки</strong><br>{{ $order->address }}, {{ $order->zip }}</p>
                                                @endif

                                                @if($order->users_comment)
                                                    <p><strong>Комментарий к заказу</strong><br>{{ $order->users_comment }}</p>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                @endforeach
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
