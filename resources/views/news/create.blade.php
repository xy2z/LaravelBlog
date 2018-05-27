@extends('layout')

@section('title', 'Create Post')

@section('scripts')
  @include('assets/jquery')
  <script type="text/javascript" src="/js/news_create.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
    <h1>Create Post</h1>

    @include('assets/errors')

    <form method="post" action="/news/create">
        @include('news._form')
        <button class="action">Publish</button>
    </form>
@endsection
