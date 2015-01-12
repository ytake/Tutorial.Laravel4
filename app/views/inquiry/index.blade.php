@extends('layouts.default')
@section('content')
<h1>inquirys</h1>
{{HTML::linkAction('inquiry.form', 'add inquiry', null, ['class' => "btn btn-primary"])}}
<table class="table table-striped">
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>&nbsp;</th>
</tr>
@if(count($list))
@foreach($list as $row)
<tr>
    <td>{{$row->inquiry_id}}</td>
    <td>{{$row->inquiry_title}}</td>
    <td>
        {{HTML::linkAction('inquiry.show', 'show inquiry', ['id' => $row->inquiry_id], ['class' => "btn btn-primary"])}}
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="3">inquiry, not found</td>
</tr>
@endif
</table>
{{$list->links()}}
@stop
