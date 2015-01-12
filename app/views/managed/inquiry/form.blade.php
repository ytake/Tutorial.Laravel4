@extends('layouts.dashboard')
@section('content')
<h1>post inquiry</h1>
{{Form::open(['route' => ['managed.inquiry.confirm', $id], 'method' => 'post', 'role' => "form"])}}
<div class="form-group @if($errors->has('inquiry_title'))has-error @endif">
    {{Form::label('inquiry_title', 'タイトル')}}
    <label class="control-label" for="inquiry_title">
        {{$errors->first('inquiry_title')}}
    </label>
    {{Form::text('inquiry_title', (isset($inquiry->inquiry_title)) ? $inquiry->inquiry_title : '', ['class' => 'form-control', 'id' => 'inquiry_title'])}}
</div>
<div class="form-group @if($errors->has('inquiry_body'))has-error @endif">
    {{Form::label('inquiry_body', '本文')}}
    <label class="control-label" for="inquiry_body">
        {{$errors->first('inquiry_body')}}
    </label>
    {{Form::textarea('inquiry_body', (isset($inquiry->inquiry_body)) ? $inquiry->inquiry_body : '', ['class' => 'form-control', 'id' => 'inquiry_body', 'rows' => "10"])}}
</div>
{{Form::submit('confirm', ['name' => '_confirm', 'class' => "btn btn-info"])}}
{{Form::close()}}
@stop
