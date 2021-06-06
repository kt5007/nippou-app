<!DOCTYPE HTML>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nippou-app | @yield('title')</title>
    <meta name="description" itemprop="description" content="@yield('description')">
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/canvas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://kit.fontawesome.com/66a7b24399.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/footerFixed.js') }}"></script> 
</head>

<body>

    <!-- header -->
    @include('layouts.header')

    <div class="container" style="margin-top:100px;padding-bottom:0px;">
        <!-- コンテンツ -->
        @yield('content')
    </div>


    @include('layouts.footer')

    <!-- footer -->

</body>

</html>
