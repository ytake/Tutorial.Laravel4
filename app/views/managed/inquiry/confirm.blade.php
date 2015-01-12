@extends('layouts.dashboard')
@section('content')
<h1>post inquiry</h1>
{{Form::open(['route' => ['managed.inquiry.apply', $id], 'method' => 'post', 'role' => "form"])}}
{{$hidden}}
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
