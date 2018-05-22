@extends('main')

@section('title', $news->title)

@section('content')

    @if (Auth::check())
        <div class="admin_bar">
            <strong>Admin</strong>:
            <a href="/news/edit/{{ $news->id }}">Edit this post</a>
        </div>
    @endif

    <h1>{{ $news->title }}</h1>

    {{--
    <div style="font-size: 0.8em;margin-bottom: 2em;">
        <strong>Tags:</strong>
         @forelse ($categories as $row)
            <a href="/tags/{{ $row->id }}">{{ $row->title }}</a>
        @empty
            No tags...
        @endforelse
    </div> --}}

    <div style="font-size: 0.9em; margin-bottom: 1em; color: #999;">
        {{-- Written {{ $news->created_at->format('M j. Y, H:i') }} --}}
        Written {{ $news->created_at }}
    </div>

    {!! $news->body !!}

    <br />
    <br />
    <hr />
    <div>
        <a href="/">&larr; Back to news list</a>
    </div>

@endsection
