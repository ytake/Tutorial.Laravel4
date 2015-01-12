@extends('layouts.default')
@section('content')
<h1>post inquiry apply</h1>
{{HTML::linkAction('inquiry.form', 'return inquirys', null, ['class' => "btn btn-primary"])}}
@stop