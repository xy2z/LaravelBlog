@extends('layout')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to my blog!</h1>
    This is made in Laravel 5.6.<br />
    <br />
    Here's the latest news:<br />
    <br />
    <hr />

    @include('news._list')
@stop