<DOCTYPE HTML>

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
    <link href="{{ asset('css/footer.css') }}"rel="stylesheet">
    <link href="{{ asset('css/header.css') }}"rel="stylesheet">
    <link href="{{ asset('css/content.css') }}"rel="stylesheet">

    <script src="https://kit.fontawesome.com/66a7b24399.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- header -->


@include('layouts.header')
<div class="container"  id="wrapper">
    <div class="row" id="content">
        <div class="col-md-12">
        <!-- コンテンツ -->
        @yield('content')
        </div>
    </div>
</div>

<div id="wrapper">
    @include('layouts.footer')
</div>

<!-- footer -->
</body>
</html>