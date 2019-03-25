@extends('layouts.master')
@section('title', 'правила работы сайта')
@section('description', '')
@section('robots', 'all')
@section('styles')
    <style>
        .panel-body ol li{
            font-size: 20px;
            text-align: justify;
        }
        .panel-body{
            padding: 60px !important;
        }
    </style>
@endsection
@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Правила работы сайта</li>
            </ol>
        </div>

        <section class="page-block">
            <div class="container">
                <div class="page-heading center">
                    <h1>Правила работы сайта</h1>
                </div>

                <div class="panel static panel-primary">
                    <div class="panel-body">
                        <ol>
                            <li>Данный сайт является демонстрационным интернет магазином. Это значит что вы не можете здесь ничего купить по-настоящему. Тем не менее, вы можете добавить товары в корзину, оформить заказ, управлять заказом (через административную панель), писать комментарии и вести блог, и многое другое (все возможности сайта описаны в инструкции).</li>
                            <li>Все ваши личные данные никак не используются. Вы сами можете создать пользователя, а потом сами же его и удалить.</li>
                            <li>Все ваши данные (включая аккаун, заказы, оставленные посты и комментарии) могут быть удалены без обяъснения причин.</li>
                            <li>На данном сайте запрещается оставлять записи, которые не подчинаются законам РФ.</li>
                            <li>Все изображения, информацию о товарах, адреса и телефоны приведены здесь в демонстрационных целях. Из всех способов связи реальных здесь только email. Вы можете писать на него или через контактную форму.</li>
                            <li>Все возможности сайта приведены в инструкции.</li>
                            <li>Сайт собирает данные cookie.</li>
                            <li>Если вас что-то не устраивает, то просьба покинуть данный сайт.</li>
                        </ol>
                        <div class="text-center">
                            <a href="https://yandex.ru" class="btn btn-outline-primary btn-md">Не хочу продолжать работу с сайтом</a>
                            <a href="" class="btn btn-primary btn-md">Хочу продолжить работу с сайтом</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
