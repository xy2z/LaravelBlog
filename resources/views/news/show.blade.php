@extends('layout')

@section('title', $news->title)

@section('content')

    @if (Auth::check())
        <div class="admin_bar">
            <strong>Admin</strong>:
            <a href="/news/edit/{{ $news->pretty_url }}">Edit this post</a>
        </div>
    @endif

    <h1>{{ $news->title }}</h1>

    <div style="font-size: 0.9em; margin-bottom: 1em; color: #999;">
        {{ $news->created_at->format('M j, Y') }}
    </div>

    <div id="news_body">
        {!! $news->body !!}
    </div>

    @include('news._back')

@endsection
