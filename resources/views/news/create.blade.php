@extends('main')

@section('title', 'Create News Post')

@section('content')
    <h1>Create new post!</h1>
    <form method="post" action="/news/create">
    	{{ csrf_field() }}

        Title:<br />
        <input type="text" name="title" />
        <br />
        Body:<br />
        <textarea name="body"></textarea>

        <button>Publish</button>
    </form>
@endsection
