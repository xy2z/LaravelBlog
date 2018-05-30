@extends('layout')

@section('title', $news->title)

@section('content')

    @if (Auth::check())
        <div class="admin_bar">
            <strong>Admin</strong>:
            <a href="/news/edit/{{ $news->pretty_url }}">Edit this post</a>
        </div>
    @endif

    @if ($news->published == 0)
        <div class="warning">
            This post is not published.
        </div>
    @endif

    <article>
        <h1>{{ $news->title }}</h1>

        <div class="details">
            <div class="date">{{ $news->created_at->format('M j, Y') }}</div>
            @forelse ($news->categories as $category)
                <a href="/news/tags/{{ strtolower($category->title) }}">{{ $category->title }}</a>
            @empty
                No tags...
            @endforelse
        </div>

        <div id="news_body">
            {!! $news->body !!}
        </div>
    </article>

    @includeWhen($news->allow_comments, 'news.disqus_comments', ['id' => $news->id])
    @include('news._back')

@endsection
