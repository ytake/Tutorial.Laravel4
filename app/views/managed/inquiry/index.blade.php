@extends('layouts.dashboard')
@section('content')
<h1>inquirys</h1>
<table class="table table-striped">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Title</th>
    <th>&nbsp;</th>
</tr>
@if(count($list))
@foreach($list as $row)
<tr>
    <td>{{$row->inquiry_id}}</td>
    <td>{{$row->inquiry_name}}</td>
    <td>{{$row->inquiry_email}}</td>
    <td>{{$row->inquiry_title}}</td>
    <td>
        {{HTML::linkAction('managed.inquiry.show', 'show inquiry', ['id' => $row->inquiry_id], ['class' => "btn btn-primary"])}}
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="4">inquiry, not found</td>
</tr>
@endif
</table>
{{$list->links()}}
@stop
