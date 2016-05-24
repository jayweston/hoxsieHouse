@extends('layouts.app')

@if(!empty($post->meta()->title))
	@section('title',$post->meta()->title)
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

@if(!empty( App\Models\Post::SITE_NAMES[$post->type] ))
	@section('site_name',App\Models\Post::SITE_NAMES[$post->type])
@endif

@if(!empty($post->avialable_at))
	@section('created_at',$post->avialable_at)
@endif

@section('content')

	{{-- Admin controls --}}
	@if(!Auth::guest()) @if( (Auth::user()->type == App\Models\User::TYPE_ADMIN) || (App\Models\User::isPostMine($post->id)) )
		<div class="form-group">
			<a href="/post/{{ $post->id }}/edit" class="btn btn-primary pull-left">Edit</a>
			{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'delete']) !!}	{!! Form::submit('Delete', ['class' =>'btn btn-danger pull-right']) !!}	{!! Form::close() !!}<br/>
		</div>
	@endif @endif

	{{-- Post Title --}}
	<div class="post-title">{{ $post->title }}</div>

	{{-- Image Carousel --}}
	<div class="post-images owl-carousel">
		@foreach ($post->carouselImages as $image)
			<div class="item owl-section">
				<div class="owl-label">{{ $image->label }}</div>
				<img src="/images/blog/{{ $post->id }}/{{ $image->name }}" height="300px" class="owl-image" />
			</div>
		@endforeach
	</div>

	{{-- Post content --}}
	<div class="post-content">{!! $post->content !!}</div>

	{{-- Show post comment --}}
	<div class="post_comments">
		@if ( empty(App\Models\Comment::comments($post->id)[0]) )
			<div class="post_comment">
				There are no comments to display.
			</div>
		@else
			@foreach( App\Models\Comment::comments($post->id) as $comment)
				<div class="post_comment level_{{ $comment->level }}">
					<div class="comment_head row">
						<div class="comment_name pull-left">
							{{ $comment->user()->name }}
						</div>
						<div class="comment_date pull-left">
							{{ $comment->timeElapsed() }}
						</div>
						@if ( !Auth::guest() )
						@if ( Auth::user()->type == App\Models\User::TYPE_ADMIN )
								{{ Form::open(['action' => ['CommentController@destroy',$comment->id], 'method' => 'DELETE']) }}
								{!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['type'=>'submit', 'class' => 'glyph_button']) !!}</span>
								{{ Form::close() }}
						@endif
						@endif
					</div>
					<div class="comment_body row">
						{{ $comment->comment }}
					</div>
					@if( App\Models\Comment::canComment($comment->level) )
						<div class="comment_reply hidden">
							{!! Form::open(['action' => ['CommentController@store']]) !!}
								{!! Form::hidden('post_id',$post->id) !!}
								{!! Form::hidden('parent_id',$comment->id) !!}
								{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
								{!! Form::submit('Save', ['class' =>'btn btn-primary pull-left']) !!}
							{!! Form::close() !!}
							{!! Form::submit('Close', ['class' =>'btn ajax-reply comment-hide']) !!}
						</div>
						<div class="comment_reply_button">
							{!! Form::submit('Replay', ['class' =>'btn ajax-reply comment-show']) !!}
						</div>
					@endif
				</div>
			@endforeach
		@endif
		<div class="level_1">
			@if( App\Models\Comment::canComment(1) )
			{!! Form::open(['action' => ['CommentController@store']]) !!}
				{!! Form::hidden('post_id',$post->id) !!}
				{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
				{!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}
			{!! Form::close() !!}
			@endif
		</div>
	</div>
@endsection

@section('css')
	@parent
	<link href="/css/owl.carousel.css" rel="stylesheet">
@stop

@section('scripts')
	@parent
	{{-- set the active navbar --}}
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_{{ $post->type }}').addClass('active');
			$('#nav_post_dropdown').addClass('active');
		});	
	</script>
	{{-- Owl carousel --}}
	<script src="/js/owl.carousel.min.js"></script>
	<script>
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items:4,
			loop:true,
			margin:30,
			nav:true,
			lazyLoad:true,
			autoWidth:true,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
		});

		$('.play').on('click',function(){
			owl.trigger('autoplay.play.owl',[1000])
		})

		$('.stop').on('click',function(){
			owl.tri4gger('autoplay.stop.owl')
		})
		$( "p" ).prev( ".owl-image" ).css( "width", "yellow" );
		$( "p" ).width()
	</script>
	<script>
		$(function () {
			$('.ajax-reply').on('click', function () {
				$(this).parent().parent().find('.comment_reply').toggleClass('hidden');
				$(this).parent().parent().find('.comment-show').addClass('hidden');
			});
			$('.comment-hide').on('click', function () {
				$(this).parent().parent().find('.comment-show').removeClass('hidden');
			});
		});
	</script>
@stop