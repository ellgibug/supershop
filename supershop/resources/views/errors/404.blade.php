@extends('layouts.master')
@section('title', '404 - Страница не найдена')
@section('robots', 'noindex')

@section('content')
<div class="page">

    <!--404 Error Page-->
    <div style="background-image:url(img/specialty-page/banner.jpg);" class="specialty-page-bg"><span></span></div>
    <section class="specialty-page">
        <div class="container">
            <div class="error-numb"><span>4</span>0<span>4</span></div>
            <h3 class="light-weight">Страницы {{ \urldecode(request()->fullUrl()) }} не существует</h3>
            <p>Попробуйте поискать что-нибудь другое или вернитесь на главную страницу</p>
            <a class="btn btn-primary btn-center" href="{{ route('shop.index') }}">Главная страница</a>
        </div>
    </section>
</div>
@endsection
