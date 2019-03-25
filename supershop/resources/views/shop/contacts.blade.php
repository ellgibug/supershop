@extends('layouts.master')
@section('title', 'контакты')
@section('description', '')
@section('robots', 'all')
@section('styles')

@endsection
@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li class="active">Контакты</li>
            </ol>
        </div>

        <section class="page-block">
            <div class="container">
                <div class="page-heading center">
                    <h1>Контакты</h1>
                </div>

                @if(Session::has('contactsMessage'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('contactsMessage') }}</p>
                    </div>
                @endif

                @include('errors.errors')

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="page-heading center">
                            <h3>Адрес<span></span></h3>
                        </div>
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac26329ffdbd76d5b203109213db78cab76a6826e6305bc854fabc1b4a923e1b6&amp;source=constructor" width="100%" height="270" frameborder="0"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="page-heading center">
                            <h3>Оставьте сообщение, отзыв или комментарий<span></span></h3>
                        </div>
                        <form method="post" action="{{ route('contacts.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="sr-only" for="name"></label>
                                    <input class="form-control input-lg" type="text" name="name" id="name" placeholder="Имя" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="sr-only" for="email"></label>
                                    <input class="form-control input-lg" type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label class="sr-only" for="message"></label>
                                    <textarea class="form-control input-lg" name="message" id="message" rows="5" placeholder="Сообщение" required>{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <input class="btn btn-md btn-primary btn-center" type="submit" value="Отправить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
