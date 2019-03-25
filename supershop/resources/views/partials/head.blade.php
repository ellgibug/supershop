<meta charset="utf-8">
<title>SuperShop демо магазин на Laravel: @yield('title')</title>
<!--SEO Meta Tags-->
<meta name="description" content="SuperShop демо интернет магазин на Laravel 5. : @yield('description')" />
<meta name="robots" content="@yield('robots')" />
<!--Mobile Specific Meta Tag-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--Favicon-->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!--Master Slider Styles-->
<link href="{{ asset('masterslider/style/masterslider.css') }}" rel="stylesheet" media="screen">
<!--Master Slider Skin Light-6 Used For Product Showcase Slider-->
<link href="{{ asset('masterslider/skins/light-6/style.css') }}" rel="stylesheet" media="screen">
<!--Kedavra Stylesheet-->
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" media="screen">
<!--Modernizr-->
<script src="{{ asset('js/libs/modernizr.custom.js') }}"></script>
<!--Adding Media Queries Support for IE8-->
<!--[if lt IE 9]>
<script src="{{ asset('js/plugins/respond.js')}}"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;subset=cyrillic-ext" rel="stylesheet">
<style>
    a, p, span, h1, h2, h3, h4, h5, h6, input, textarea, select, li, option, div{
        font-family: 'Roboto', sans-serif;
    }

    .pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}
    .pagination>li{display:inline-block; margin-right: 10px;}.pagination>li:last-child{margin-right: 0px;}
    .pagination>li>a,.pagination>li>span{position:relative;float:left;padding:2px 7px;margin-left:-1px;line-height:1.42857143;color:#448956;text-decoration:none;background-color:#fff;border:1px solid #ddd}
    .pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-radius:4px;}
    .pagination>li:last-child>a,.pagination>li:last-child>span{border-radius:4px;}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#448956;border-color:#448956; border-radius:3px }.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}

    h1.product-name{
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 600;
        color:#448956;
    }
    h6.filter-header{
        font-weight: 600;
        color:#448956;
        font-size: 1em;
    }
    .mb-15{
        margin-bottom: 15px !important;
    }


</style>