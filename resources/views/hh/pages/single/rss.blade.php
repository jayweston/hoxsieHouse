<rss version="2.0">
<channel>
<title>Hoxsie House</title>
<link>{{ URL::to( '/' ) }}</link>
<description>My Lifestyle blog</description>
@foreach($posts as $post)
<item>
<title>{{ $post->title }}</title>
<link>{{ $post->url }}</link>
<guid>{{ $post->url }}</guid>
<pubDate>{{ date_format(date_create($post->avialable_at),"D, d M Y H:i:s T") }}</pubDate>
<description>{{ $post->summary }}</description>
</item>
@endforeach
</channel>
</rss>
