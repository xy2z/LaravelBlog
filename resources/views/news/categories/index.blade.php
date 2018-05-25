@extends('layout')

@section('title', $category->title)

@section('content')
    <h1>{{ $category->title }}</h1>
    <hr />

    @include('news._list')

    @include('news._back')
@stop