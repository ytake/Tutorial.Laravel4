@extends('layouts.dashboard')
@section('content')
<h1>post article apply</h1>
{{HTML::linkAction('managed.article.index', 'return articles', null, ['class' => "btn btn-primary"])}}
@stop