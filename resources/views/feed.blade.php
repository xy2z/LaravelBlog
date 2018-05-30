<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title><![CDATA[{{ env('APP_NAME') }}]]></title>
    <description><![CDATA[]]></description>
    <link><![CDATA[{{ URL::route('home') }}]]></link>
    <language><![CDATA[en]]></language>

    @foreach ($news as $row)
        <item>
            <guid isPermaLink="false"><![CDATA[{{ URL::to('/') }}/news/{{ $row->id }}]]></guid>
            <title><![CDATA[{{ $row->title }}]]></title>
            <description><![CDATA[{!! $row->body !!}]]></description>
            <link><![CDATA[{{ URL::to('/') }}/news/{{ $row->id }}]]></link>

            <pubDate><![CDATA[{{ date(DATE_RFC2822, strtotime($row->created_at)) }}]]></pubDate>
        </item>
    @endforeach

  </channel>
</rss>