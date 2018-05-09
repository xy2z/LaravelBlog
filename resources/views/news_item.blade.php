@extends('main')

@section('title', 'Welcome')

@section('content')

    <h1>{{ $news->title }}</h1>

        <div style="font-size: 0.8em;margin-bottom: 2em;">
            <strong>Tags:</strong>
            @forelse ($categories as $row)
                <a href="#">{{ $row->title }}</a>
            @empty
                No tags...
            @endforelse
        </div>

        {!! $news->body !!}

        <br />
        <br />
        <hr />
        <div>
            <a href="/">&larr; Back to news list</a>
        </div>

@stop
