[
@foreach($posts as $key => $post)
@if( $key != 0)
,
@endif
{
	"title":"{{ $post->title }}",
	"start":"{{ date_format(date_create($post->avialable_at),'Y-m-d') }}",
	"url":"{{ $post->url }}"
}
@endforeach
]
