@extends('layouts.dashboard')
@section('scripts')
<script src="/js/article.js"></script>
@stop
@section('content')
<h1>article&nbsp;:&nbsp;{{e($article->article_title)}}</h1>
<div class="form-group @if($errors->has('article_body'))has-error @endif">
    {{Form::label('article_body', '本文')}}
    <p class="form-control-static">{{nl2br(e($article->article_body))}}</p>
</div>
{{HTML::linkAction('managed.article.form', 'edit', ['id' => $article->article_id], ['class' => "btn btn-primary"])}}
&nbsp;<button id="delete" class="btn btn-danger" data-id="{{$article->article_id}}">delete this article</button>
@stop