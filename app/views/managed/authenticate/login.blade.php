@extends('layouts.login')
@section('content')
{{Form::open(['route' => 'authenticate.apply', 'class' => 'form-signin', 'role' => 'form'])}}
    <h2 class="form-signin-heading">Please sign in</h2>
    {{Form::text('user_name', null, ['class' => "form-control", "placeholder" => "your name", "required autofocus"])}}
    {{Form::password('password', ['class' => "form-control", "placeholder" => "password", "required"])}}
    {{Form::submit('Sign in', ['class' => "btn btn-lg btn-primary btn-block"])}}
{{Form::close()}}
@if($errors->any())
<div class="alert alert-danger">{{$errors->first()}}</div>
@endif
@stop