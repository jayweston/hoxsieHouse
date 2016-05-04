@extends('layouts.app')

@section('title',$post->meta()->title)
@section('description',$post->meta()->description)
@section('tags','')
@section('lat',$post->meta()->lat)
@section('long',$post->meta()->long)
@section('street',$post->meta()->street)
@section('city',$post->meta()->city)
@section('zip',$post->meta()->zip)
@section('country',$post->meta()->country)
@section('image',$post->thumbnailPath())
@section('site_name',App\Models\Post::SITE_NAMES[$post->post_type])
@section('created_at',$post->avialable_at)

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
