@extends('main')

@section('title', 'Edit News Post')

@section('content')
    <h1>Edit post</h1>

    @include('assets/errors')

    <form method="post" action="/news/edit/{{ $news->id }}">
    	{{ csrf_field() }}

        Title:<br />
        <input type="text" name="title" value="{{ $news->title }}" />

        <br />
        Body:<br />
        <textarea name="body">{{ $news->body }}</textarea>

        <button>Save changes</button>
    </form>
@endsection
