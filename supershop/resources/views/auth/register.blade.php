{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('layouts.master')
@section('title', '')
@section('description', '')
@section('robots', 'all')
@section('styles')

@endsection
@section('content')
<div class="page">

    <!--Login Page-->
    <div style="background-image:url(img/specialty-page/banner.jpg);" class="specialty-page-bg"></div>
    <section class="specialty-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <div class="page-heading">
                        <h2>Регистрация</h2>
                        <h3>Став нашим любимым клиентом, Вы сможете совершать покупки с максимальной выгодой</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form method="post" class="signup-form space-bottom" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="sr-only" for="name"></label>
                                    <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Имя" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="surname"></label>
                                    <input type="text" class="form-control input-lg" name="surname" id="surname" placeholder="Фамилия" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="email"></label>
                                    <input type="email" class="form-control input-lg" name="email" id="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="phone"></label>
                                    <input type="tel" class="form-control input-lg" name="phone" id="phone" placeholder="Телефон" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <div class="select-style">
                                            <select name="date" id="date">
                                                @for($i=1; $i<32; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <div class="select-style">
                                            <select name="month" id="month">
                                                <option value="01">Январь</option>
                                                <option value="02">Февраль</option>
                                                <option value="03">Март</option>
                                                <option value="04">Апрель</option>
                                                <option value="05">Май</option>
                                                <option value="06">Июнь</option>
                                                <option value="07">Июль</option>
                                                <option value="08">Август</option>
                                                <option value="09">Сентябрь</option>
                                                <option value="10">Октябрь</option>
                                                <option value="11">Ноябрь</option>
                                                <option value="12">Декабрь</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="select-style">
                                            <select name="year" id="year">
                                                @for($i=1950; $i<2011; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="gender" id="gender01" value="m" checked> Мужской</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="gender" id="gender02" value="f"> Женский</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password"></label>
                                    <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Пароль" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password_confirmation"></label>
                                    <input type="password" class="form-control input-lg" name="password_confirmation" id="password_confirmation" placeholder="Подтвержение пароля" required>
                                </div>
                                <input class="btn btn-md btn-primary btn-center" type="submit" value="Зарегистрироваться">
                            </form>
                        </div>
                        {{--<div class="col-md-6 col-sm-6 social-sugnup">--}}
                            {{--<a class="twitter" href="#">Войти через Twitter</a>--}}
                            {{--<a class="facebook" href="#">Войти через Facebook</a>--}}
                            {{--<a class="vk" href="#">Войти через Vk</a>--}}
                        {{--</div>--}}
                    </div>
                    <p class="helper-text">Регистрируясь, Вы соглашаетесь со всеми <a class="helper-text" href="#">правилами работы</a> сайта.</p>
                    <p>Уже зарегистрированы? Жмите <a href="{{ route('login') }}">сюда</a>.</p>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('scripts')

@endsection