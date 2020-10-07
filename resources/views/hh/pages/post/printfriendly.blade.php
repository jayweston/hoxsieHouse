@extends('hh.layouts.blank')

@if(!empty($post->meta()->title))
	@section('title','HoxsieHouse - '.$post->meta()->title)
@endif

@if(!empty($post->meta()->description))
	@section('description',$post->meta()->description)
@endif

@if(false)
	@section('tags','')
@endif

@if(!empty($post->meta()->lat))
	@section('lat',$post->meta()->lat)
@endif

@if(!empty($post->meta()->long))
	@section('long',$post->meta()->long)
@endif

@if(!empty($post->meta()->street))
	@section('street',$post->meta()->street)
@endif

@if(!empty($post->meta()->city))
	@section('city',$post->meta()->city)
@endif

@if(!empty($post->meta()->zip))
	@section('zip',$post->meta()->zip)
@endif

@if(!empty($post->meta()->country))
	@section('country',$post->meta()->country)
@endif

@if(!empty($post->thumbnailPath()))
	@section('image',$post->thumbnailPath())
@endif

@if(!empty( App\Models\hh\Post::SITE_NAMES[$post->type] ))
	@section('site_name',App\Models\hh\Post::SITE_NAMES[$post->type])
@endif

@if(!empty($post->avialable_at))
	@section('created_at',$post->avialable_at)
@endif

@section('content')
	{{-- Post Title --}}
	<div class="post-title">{{ $post->title }}</div>

	{{-- Publish Date --}}
	<div class="post-date">Posted {{ date('F d, Y', strtotime($post->avialable_at)) }}</div>

	{{-- Post content --}}
	<div class="post-content">{!! $post->content !!}</div>

	{{-- Post Tags --}}

	@if (count($post->tags()) > 0)
		<div class="post-box"><h4 class="post-box-title"><span>Tags</span></h4></div>
		<div class="post-tags">
			@foreach ($post->tags() as $tag)
				<li><a href="/tag/{{ $tag->name }}"><span class="post-tag">{{ $tag->name }}</span></li></a>
			@endforeach
		</div>
	@endif

	{{-- Show post comment --}}
	<div class="post-box"><h4 class="post-box-title"><span>Comments</span></h4></div>
	@if ( empty(App\Models\hh\Comment::comments($post->id)[0]) )
		<div class="post_comment">
			There are no comments to display.
		</div>
	@else
		@foreach( App\Models\hh\Comment::comments($post->id) as $comment)
			<div class="comment level_{{ $comment->level }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="list-inline">
							<li>{{ $comment->user()->name }}</li>
							<li class="float-right">{{ $comment->timeElapsed() }}</li>
						</ul>
					</div>
					<div class="panel-body">
						{{ $comment->comment }}
					</div>
				</div>
			</div>
		@endforeach
	@endif
@endsection
