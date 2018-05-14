@extends('main')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to my blog!</h1>
    This is made in Laravel 5.6.<br />
    <br />
    Here's the latest news:<br />
    <ul>
        @forelse ($news as $row)
            <li><a href="/news/{{ $row->id }}">{{ $row->title }}</a> <span class="date">{{ $row->created_at->diffForHumans() }}</span></li>
        @empty
            No posts...
        @endforelse
    </ul>
@stop