@extends('layouts.dashboard')
@section('content')
<h1>articles</h1>
{{HTML::linkAction('managed.article.form', 'add article', null, ['class' => "btn btn-primary"])}}
<table class="table table-striped">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>&nbsp;</th>
</tr>
@if(count($list))
@foreach($list as $row)
<tr>
    <td>{{$row->article_id}}</td>
    <td>{{$row->article_title}}</td>
    <td>
        {{HTML::linkAction('managed.article.show', 'show article', ['id' => $row->article_id], ['class' => "btn btn-primary"])}}
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="3">article, not found</td>
</tr>
@endif
</table>
{{$list->links()}}
@stop
