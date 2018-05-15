@extends('main')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to my blog!</h1>
    This is made in Laravel 5.6.<br />
    <br />
    Here's the latest news:<br />
    <br />
    <hr />

    @forelse ($news as $row)
        <article>
            <h2><a href="/news/{{ $row->id }}">{{ $row->title }}</a></h2>
            <div class="date">{{ $row->created_at->diffForHumans() }}</div>
            <div class="body">{{ $row->body }}</div>
        </article>
    @empty
        No posts...
    @endforelse
@stop