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
    <link href="/css/blog.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('elements.header')
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title">Tutorial</h1>
        <p class="lead blog-description">Laravel Tutorial Application</p>
    </div>
    @yield('content')
</div>
@include('elements.footer')
{{HTML::script("//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js")}}
{{HTML::script("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js")}}
@yield('scripts')
</body>
</html>