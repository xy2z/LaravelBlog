@extends('layout')

@section('title', $news->title)

@section('content')

    @if (Auth::check())
        <div class="admin_bar">
            <strong>Admin</strong>:
            <a href="/news/edit/{{ $news->pretty_url }}">Edit this post</a>
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

    {{-- Comments --}}
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
        this.page.url = '{{ URL::to('/') }}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{ $news->id }};
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laravelblog-11.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    </script>

    @include('news._back')

@endsection
