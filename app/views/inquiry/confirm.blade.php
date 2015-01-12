@extends('layouts.default')
@section('content')
<h1>post inquiry</h1>
{{Form::open(['route' => ['inquiry.apply', $id], 'method' => 'post', 'role' => "form"])}}
{{$hidden}}
<div class="form-group @if($errors->has('inquiry_name'))has-error @endif">
    {{Form::label('inquiry_name', 'お名前')}}
    <p class="form-control-static">{{e(Input::get('inquiry_name'))}}</p>
</div>
<div class="form-group @if($errors->has('inquiry_email'))has-error @endif">
    {{Form::label('inquiry_email', 'メールアドレス')}}
    <p class="form-control-static">{{e(Input::get('inquiry_email'))}}</p>
</div>
<div class="form-group @if($errors->has('inquiry_title'))has-error @endif">
    {{Form::label('inquiry_title', 'タイトル')}}
    <p class="form-control-static">{{e(Input::get('inquiry_title'))}}</p>
</div>
<div class="form-group @if($errors->has('inquiry_body'))has-error @endif">
    {{Form::label('inquiry_body', '本文')}}
    <p class="form-control-static">{{nl2br(e(Input::get('inquiry_body')))}}</p>
</div>
{{Form::submit('return', ['name' => '_return', 'class' => "btn btn-warning"])}}
&nbsp;
{{Form::submit('apply', ['name' => '_apply', 'class' => "btn btn-info"])}}
{{Form::close()}}
@stop
