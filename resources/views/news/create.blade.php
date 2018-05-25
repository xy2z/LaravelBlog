@extends('layout')

@section('title', 'Create News Post')

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
    <h1>Create new post!</h1>

    @include('assets/errors')

    <form method="post" action="/news/create">
        @include('news._form')
        <button>Publish</button>
    </form>
@endsection
