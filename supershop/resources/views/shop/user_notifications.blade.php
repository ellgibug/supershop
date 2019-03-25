@extends('layouts.master')
@section('title', 'настройка уведомлений')
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
                        <h3 class="heading center">Уведомления<span></span></h3>
                        <div class="row">
                            <h4 class="text-center">Скоро</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
