@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
			Title: <a href="/post/{{ $post->id }}">{{ $post->title }}</a><br/>
			Summary: {!! $post->summary !!}<br/>
			Date: {!! $post->avialable_at !!}
		</div>
		<hr/>
	@endforeach
	{!! $posts->render() !!}
@endsection
