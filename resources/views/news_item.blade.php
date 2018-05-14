@extends('main')

@section('title', $news->title)

@section('content')

    <h1>{{ $news->title }}</h1>

    <div style="font-size: 0.8em;margin-bottom: 2em;">
        <strong>Tags:</strong>
        @forelse ($categories as $row)
            <a href="/tags/{{ $row->id }}">{{ $row->title }}</a>
        @empty
            No tags...
        @endforelse
    </div>

    <div style="font-size: 0.9em; margin-bottom: 1em; color: #999;">
        Written {{ $news->created_at->format('M j. Y, H:i') }}
    </div>

    {!! $news->body !!}

    <br />
    <br />
    <hr />
    <div>
        <a href="/">&larr; Back to news list</a>
    </div>

@stop
