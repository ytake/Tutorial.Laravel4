<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <title>@yield('title', 'Laravel tutorial')</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('elements.dashboard.header')
<div class="container-fluid">
    <div class="row">
        @include('elements.dashboard.menu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @yield('content')
        </div>
    </div>
</div>
@include('elements.dashboard.footer')
{{HTML::script("//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js")}}
{{HTML::script("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js")}}
@yield('scripts')
</body>
</html>