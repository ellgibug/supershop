@extends('layouts.master')
@section('title', '')
@section('description', '')
@section('robots', 'none')
@section('styles')

@endsection
@section('content')
    <div class="page">

        <!--User Profile-->
        <section class="page-block user-account double-space-bottom">
            <div class="container">
                <div class="row">

                    <!--Side Navigation-->
                    <div class="col-md-3 navigation">
                        @include('partials.user_menu')
                    </div>

                    <!--Content-->
                    <div class="col-md-9 gray-bg">
                        <h3 class="heading center">Отзывы<span></span></h3>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h4 class="text-center">Скоро</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--User Profile Close-->
    </div>
@endsection
@section('scripts')

@endsection