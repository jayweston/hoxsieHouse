@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		Title: <a href="/post/{{ $post->id }}">{{ $post->title }}</a><br/>
		Summary: {!! $post->summary !!}<br/>
		Date: {!! $post->avialable_at !!}<hr/>
	@endforeach
	{!! $posts->render() !!}
@endsection
