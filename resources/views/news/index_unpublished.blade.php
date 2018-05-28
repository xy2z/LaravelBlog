@extends('layout')

@section('title', 'Unpublished posts')

@section('content')
    <h1>Unpublished posts</h1>
    <hr />

    @include('news._list')
    {{ $news->links('assets/pagination', ['paginator' => $news]) }}
@stop