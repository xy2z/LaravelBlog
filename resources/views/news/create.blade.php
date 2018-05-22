@extends('main')

@section('title', 'Create News Post')

@section('content')
    <h1>Create new post!</h1>

    @include('assets/errors')

    <form method="post" action="/news/create">
    	{{ csrf_field() }}

        Title:<br />
        <input type="text" name="title" value="{{ old('title') }}" />
        <br />

        <br />

        URL:<br />
        <input type="text" name="pretty_url" value="{{ old('pretty_url') }}" />
        <br />

        <br />

        Body:<br />
        <textarea name="body">{{ old('body') }}</textarea>

        <button>Publish</button>
    </form>
@endsection
