@extends('layout')

@section('title', $category->title . ' news')

@section('content')

    <h1>News tagged with {{ $category->title }}</h1>

    <ul>
        @forelse ($news as $row)
            <li><a href="/news/{{ $row->id }}">{{ $row->title }}</a> <span class="date">{{ $row->created_at }}</span></li>
        @empty
            No posts...
        @endforelse
    </ul>

@stop
