<div class="news_list">
    @forelse ($news as $row)
        <article>
            <h2><a href="/news/{{ $row->pretty_url }}">{{ $row->title }}</a></h2>

            <div class="details">
                <div class="date">{{ $row->created_at->format('M j, Y') }}</div>
                @forelse ($row->categories as $category)
                    <a href="/news/tags/{{ $category->slug() }}">{{ $category->title }}</a>
                @empty
                    No tags...
                @endforelse
            </div>

            <div class="body">{!! strip_tags($row->body_snippet()) !!}</div>
        </article>
    @empty
        No posts...
    @endforelse
</div>
