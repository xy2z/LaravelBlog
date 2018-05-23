@extends('main')

@section('title', 'Edit News Post')

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@php ($edit = true)


@section('content')
    <h1>Edit post</h1>

    @include('assets/errors')

    <form method="post" action="/news/edit/{{ $news->pretty_url }}">
        @include('news._form')
        <button>Save changes</button>
    </form>
@endsection
