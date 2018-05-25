@forelse ($news as $row)
    <article>
        <h2><a href="/news/{{ $row->pretty_url }}">{{ $row->title }}</a></h2>
        <div class="date">{{ $row->created_at->diffForHumans() }}
            /
            Tags:
            @forelse ($row->categories as $cat)
                <a href="/news/tags/{{ strtolower($cat->title) }}">{{ $cat->title }}</a>
            @empty
                No tags...
            @endforelse
        </div>
        <div class="body">{!! strip_tags($row->body_snippet()) !!}</div>
    </article>
@empty
    No posts...
@endforelse