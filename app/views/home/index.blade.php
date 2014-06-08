@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            @if(count($list))
            @foreach($list as $row)
            <h2 class="blog-post-title">{{$row->article_title}}</h2>
            <p class="blog-post-meta">{{$row->created_at}}</p>
            <p>{{nl2br(e($row->article_body))}}</p>
            @endforeach
            @else
            <h2 class="blog-post-title">Start Writing Articles</h2>
            @endif
        </div>
        <div class="blog-post">
            {{$list->links()}}
        </div>
    </div>
</div>
@stop