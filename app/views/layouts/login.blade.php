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
    <link href="/css/login.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div class="container">
    @yield('content')
</div>
@yield('scripts')
</body>
</html>