@extends('layouts.master')
@section('title', 'мой личный кабинет')
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
                    <h3 class="heading center">Личная информация<span></span></h3>

                    @include('errors.errors')

                    @if(Session::has('updatePersonalInfoMessage'))
                        <div class="home-notification">
                            <p>{{ Session::get('updatePersonalInfoMessage') }}</p>
                        </div>
                    @endif

                    <form method="post" class="account-settings" action="{{ route('personalInfo.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="row">
                            <div class="col-md-7 col-sm-7 space-bottom">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="surname">Фамилия <span>*</span></label>
                                        <input class="form-control" type="text" name="surname" id="surname" value="{{ Auth::guard('web')->user()->surname }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Имя <span>*</span></label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::guard('web')->user()->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span>*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{ Auth::guard('web')->user()->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Телефон <span>*</span></label>
                                        <input class="form-control" type="tel" name="phone" id="phone" value="{{ Auth::guard('web')->user()->phone }}" required>
                                    </div>
                                </fieldset>
                                <div class="pass-block">
                                    <span class="close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></span>
                                    <div class="cur-pass">
                                        <label for="af-cur-pass">Пароль</label>
                                        <input type="text" name="af-cur-pass" id="af-cur-pass" value="***************" disabled>
                                        <div class="btn btn-md btn-primary edit-btn">Изменить</div>
                                        <div class="form-group">
                                            <label for="password">Новый пароль <span>*</span></label>
                                            <input class="form-control" type="password" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Подтвердить пароль <span>*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row space-top">
                            <div class="col-md-7 col-sm-7">
                                <h3 class="heading center">Дополнительная информация<span></span></h3>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12"><label>Дата рождения <span>*</span></label></div>
                                    </div>
                                    @php
                                        $bday = explode("-", Auth::guard('web')->user()->bday);
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <div class="select-style">
                                                <select name="date" id="birth-date">
                                                    @for($i=1; $i<32; $i++)
                                                    <option value="{{ $i }}" {{ $bday[2] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <div class="select-style">
                                                <select name="month" id="month">
                                                    <option value="1" {{ $bday[1] == '01' ? 'selected' : '' }}>Январь</option>
                                                    <option value="2" {{ $bday[1] == '02' ? 'selected' : '' }}>Февраль</option>
                                                    <option value="3" {{ $bday[1] == '03' ? 'selected' : '' }}>Март</option>
                                                    <option value="4" {{ $bday[1] == '04' ? 'selected' : '' }}>Апрель</option>
                                                    <option value="5" {{ $bday[1] == '05' ? 'selected' : '' }}>Май</option>
                                                    <option value="6" {{ $bday[1] == '06' ? 'selected' : '' }}>Июнь</option>
                                                    <option value="7" {{ $bday[1] == '07' ? 'selected' : '' }}>Июль</option>
                                                    <option value="8" {{ $bday[1] == '08' ? 'selected' : '' }}>Август</option>
                                                    <option value="9" {{ $bday[1] == '09' ? 'selected' : '' }}>Сентябрь</option>
                                                    <option value="10" {{ $bday[1] == '10' ? 'selected' : '' }}>Октябрь</option>
                                                    <option value="11" {{ $bday[1] == '11' ? 'selected' : '' }}>Ноябрь</option>
                                                    <option value="12" {{ $bday[1] == '12' ? 'selected' : '' }}>Декабрь</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <div class="select-style">
                                                <select name="year" id="year">
                                                    @for($i=1950; $i<2011; $i++)
                                                        <option value="{{ $i }}" {{ $bday[0] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Пол</label>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="gender" id="gender01" value="m" {{ Auth::guard('web')->user()->gender == 'm' ? 'checked' : '' }}> Мужской</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="gender" id="gender02"  value="f" {{ Auth::guard('web')->user()->gender == 'f' ? 'checked' : '' }}> Женский</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <h3 class="heading center">Адрес<span></span></h3>
                                <div class="form-group">
                                    <label for="address">Полный адрес <span>*</span></label>
                                    <textarea class="form-control" name="address" id="address" rows="4" placeholder="Область, Город, Улица, Дом, Квартира" required style="resize: none">{{ Auth::guard('web')->user()->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="zip">Индекс <span>*</span></label>
                                    <input class="form-control" type="text" name="zip" id="zip" value="{{ Auth::guard('web')->user()->zip }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row space-top">
                            <div class="col-md-3 col-sm-3 space-bottom">
                                <p class="p-sm"><span class="text-primary p-lg">*</span> Обязательные поля</p>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text-center">
                                    <input class="btn btn-md btn-primary" type="submit" value="Сохранить">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
