@extends('layouts.dashboard')
@section('content')
<h1>post article</h1>
{{Form::open(['route' => ['managed.article.confirm', $id], 'method' => 'post', 'role' => "form"])}}
<div class="form-group @if($errors->has('article_title'))has-error @endif">
    {{Form::label('article_title', 'タイトル')}}
    <label class="control-label" for="article_title">
        {{$errors->first('article_title')}}
    </label>
    {{Form::text('article_title', (isset($article->article_title)) ? $article->article_title : '', ['class' => 'form-control', 'id' => 'article_title'])}}
</div>
<div class="form-group @if($errors->has('article_body'))has-error @endif">
    {{Form::label('article_body', '本文')}}
    <label class="control-label" for="article_body">
        {{$errors->first('article_body')}}
    </label>
    {{Form::textarea('article_body', (isset($article->article_body)) ? $article->article_body : '', ['class' => 'form-control', 'id' => 'article_body', 'rows' => "10"])}}
</div>
{{Form::submit('confirm', ['name' => '_confirm', 'class' => "btn btn-info"])}}
{{Form::close()}}
@stop
