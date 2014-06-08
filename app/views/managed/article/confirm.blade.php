@extends('layouts.dashboard')
@section('content')
<h1>post article</h1>
{{Form::open(['route' => ['managed.article.apply', $id], 'method' => 'post', 'role' => "form"])}}
{{$hidden}}
<div class="form-group @if($errors->has('article_title'))has-error @endif">
    {{Form::label('article_title', 'タイトル')}}
    <p class="form-control-static">{{e(Input::get('article_title'))}}</p>
</div>
<div class="form-group @if($errors->has('article_body'))has-error @endif">
    {{Form::label('article_body', '本文')}}
    <p class="form-control-static">{{nl2br(e(Input::get('article_body')))}}</p>
</div>
{{Form::submit('return', ['name' => '_return', 'class' => "btn btn-warning"])}}
&nbsp;
{{Form::submit('apply', ['name' => '_apply', 'class' => "btn btn-info"])}}
{{Form::close()}}
@stop
