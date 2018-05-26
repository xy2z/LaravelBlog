@extends('layout')

@section('title', $category->title . ' News')

@section('content')
    <h1>{{ $category->title }} News</h1>
    <hr />

    @include('news._list')

    @include('news._back')
@stop