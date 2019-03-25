@extends('layouts.master')
@section('title', 'новая запись в блоге')
@section('description', '')
@section('robots', 'none')
@section('styles')
    <link href="{{ asset('dist/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiselect.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="page">

        <div class="container space-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('shop.index') }}">Главная</a></li>
                <li><a href="{{ route('posts.index') }}">Блог</a></li>
                <li class="active">Новая запись</li>
            </ol>
        </div>

        <section class="container space-top double-space-bottom">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="post-title">Новая запись</h1>

                    @include('errors.errors')

                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title"><strong>Название*</strong></label>
                            <input type="text" class="form-control input-lg" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body"><strong>Содержимое*</strong></label>
                            <textarea class="form-control input-lg" name="body" id="body" required>{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="images"><strong>Изображения </strong></label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            <label for="products"><strong>Товары</strong></label>
                            <select multiple class="form-control" id="products" name="products[]">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input class="btn btn-md btn-primary btn-center" type="submit" value="Сохранить">
                    </form>
                </div>

                <div class="col-md-4 space-bottom" id="sidebar">
                    @include('partials.posts_menu')
                </div>

            </div>
        </section>

        <!--Sidebar Toggle-->
        <a href="#sidebar" class="sidebar-button"><i class="fa fa-outdent"></i></a>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('dist/summernote.min.js') }}"></script>
    <script src="{{ asset('dist/lang/summernote-ru-RU.js') }}"></script>
    <script src="{{ asset('js/multiselect.js') }}"></script>
    <script src="{{ asset('js/posts.js') }}"></script>
@endsection