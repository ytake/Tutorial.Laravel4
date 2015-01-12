@extends('layouts.default')
@section('content')
<h1>post inquiry</h1>
{{Form::open(['route' => ['inquiry.confirm', $id], 'method' => 'post', 'role' => "form"])}}
<div class="form-group @if($errors->has('inquiry_name'))has-error @endif">
    {{Form::label('inquiry_name', 'お名前')}}
    <label class="control-label" for="inquiry_name">
        {{$errors->first('inquiry_name')}}
    </label>
    {{Form::text('inquiry_name', (isset($inquiry->inquiry_name)) ? $inquiry->inquiry_name : '', ['class' => 'form-control', 'id' => 'inquiry_name'])}}
</div>
<div class="form-group @if($errors->has('inquiry_email'))has-error @endif">
    {{Form::label('inquiry_email', 'メールアドレス')}}
    <label class="control-label" for="inquiry_email">
        {{$errors->first('inquiry_email')}}
    </label>
    {{Form::text('inquiry_email', (isset($inquiry->inquiry_email)) ? $inquiry->inquiry_email : '', ['class' => 'form-control', 'id' => 'inquiry_email'])}}
</div>
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
