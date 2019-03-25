@extends('layouts.master')
@section('title', 'голосование за товар дня')
@section('description', '')
@section('robots', 'all')

@section('content')
    <div class="page">
        <div style="background-image:url(img/specialty-page/banner.jpg);" class="specialty-page-bg"><span></span></div>
        <section class="specialty-page">
            <div class="container">
                <div class="page-heading center">
                    <h1>Голосование</h1>
                    <h2>Скоро</h2>
                </div>
                <a class="btn btn-primary btn-center" href="{{ route('shop.index') }}">На главную страницу</a>
            </div>
        </section>
    </div>
@endsection
