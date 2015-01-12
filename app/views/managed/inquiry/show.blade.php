@extends('layouts.dashboard')
@section('scripts')
<script src="/js/inquiry.js"></script>
@stop
@section('content')
<h1>inquiry&nbsp;:&nbsp;{{e($inquiry->inquiry_title)}}</h1>
<div class="form-group @if($errors->has('inquiry_name'))has-error @endif">
    {{Form::label('inquiry_name', '名前')}}
    <p class="form-control-static">{{nl2br(e($inquiry->inquiry_name))}}</p>
</div>
<div class="form-group @if($errors->has('inquiry_email'))has-error @endif">
    {{Form::label('inquiry_email', 'メールアドレス')}}
    <p class="form-control-static">{{nl2br(e($inquiry->inquiry_email))}}</p>
</div>
<div class="form-group @if($errors->has('inquiry_body'))has-error @endif">
    {{Form::label('inquiry_body', '本文')}}
    <p class="form-control-static">{{nl2br(e($inquiry->inquiry_body))}}</p>
</div>
<button id="delete" class="btn btn-danger" data-id="{{$inquiry->inquiry_id}}">delete this inquiry</button>
@stop