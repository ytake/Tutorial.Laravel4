@extends('layouts.dashboard')
@section('content')
<h1>post inquiry apply</h1>
{{HTML::linkAction('managed.inquiry.index', 'return inquirys', null, ['class' => "btn btn-primary"])}}
@stop