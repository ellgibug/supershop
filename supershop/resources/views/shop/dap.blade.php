@extends('layouts.master')
@section('title', 'доставка, оплата, возврат')
@section('description', '')
@section('robots', 'all')
@section('styles')

@endsection
@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Доставка, оплата, возврат</li>
            </ol>
        </div>

        <section class="page-block">
            <div class="container">
                <div class="page-heading center">
                    <h1>Доставка, оплата, возврат</h1>
                </div>

                <div class="page-heading center">
                    <h3>Доставка<span></span></h3>
                </div>

                <div class="panel static panel-primary">
                    <div class="panel-body">
                        <p><strong>1. Самовывоз</strong></p>
                        <p>Вы можете оформить доставку самовывозом по адресу: г.Москва, ... .Телефон магазина 8 (499) 123 45 67. <br>Свой заказ Вы сможете забрать уже через 1 час после его оформления. Срок хранения заказа в магазине 1 неделя. <br>Стоимость достаки - бесплатно.</p>
                        <div class="mb-3">
                            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac26329ffdbd76d5b203109213db78cab76a6826e6305bc854fabc1b4a923e1b6&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
                        </div>
                        <p><strong>2. Доставка курьером</strong></p>
                        <p>Доставка курьером осуществляется по всей территории России.<br>Срок доставки составляет 1-3 дня с момента оформления заказа.<br>Стоимость доставки составляет {{ config('constants.delivery_price') }} &#8381; при сумме заказа менее 2 000 &#8381;. При заказе на сумму от 2 000 &#8381; доставка бесплатна.</p>
                        <p>После оформления заказа Вам позвонят для уточнения деталей доставки.<br>По всем вопросам Вы можете обратиться к сотруднику магазина через <a href="{{ route('contacts.index') }}">форму обратной связи</a> или по телефону.<br>Вы можете отслеживать статус доставки заказа в личном кабинете.</p>
                    </div>
                </div>

                <div class="page-heading center double-space-top">
                    <h3>Оплата<span></span></h3>
                </div>

                <div class="panel static panel-primary">
                    <div class="panel-body">
                        <p><strong>1. Наличными курьеру или в магазине</strong></p>
                        <p><strong>2. Оплата онлайн по карте</strong></p>
                    </div>
                </div>

                <div class="page-heading center double-space-top">
                    <h3>Возврат<span></span></h3>
                </div>

                <div class="panel static panel-primary">
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore eligendi error ipsa
                            iure pariatur rerum vel? Architecto aspernatur consequuntur cupiditate esse ex fugit
                            incidunt ipsa mollitia, nobis nulla pariatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore eligendi error ipsaiure pariatur rerum vel? Architecto aspernatur consequuntur cupiditate esse ex fugit
                            incidunt ipsa mollitia, nobis nulla pariatur!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore eligendi error ipsa
                            iure pariatur rerum vel? Architecto aspernatur consequuntur cupiditate esse ex fugit
                            incidunt ipsa mollitia, nobis nulla pariatur!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore eligendi error ipsa
                            iure pariatur rerum vel? Architecto aspernatur consequuntur cupiditate esse ex fugit
                            incidunt ipsa mollitia, nobis nulla pariatur!</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
