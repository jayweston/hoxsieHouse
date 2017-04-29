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
			{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'delete']) !!}	{!! Form::submit('Delete', ['class' =>'btn btn-danger pull-right confirm', 'data-confirm' => 'Are you sure you want to delete this post?']) !!}	{!! Form::close() !!}<br/>
		</div>
		<hr/>
	@endif @endif

	{{-- Share Posts --}}
	<div class="addthis_inline_share_toolbox"></div>
	<hr/>

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

	{{-- Post Tags --}}
	<div class="post-tags">
		@foreach ($post->tags() as $tag)
			<li><a href="/tag/{{ $tag->id }}">{{ $tag->name }}</li></a>
		@endforeach
	</div>

	{{-- Post content --}}
	<div class="post-content">{!! $post->content !!}</div>

	{{-- Related Posts --}}
	<hr/>
	<div class="addthis_relatedposts_inline"></div> promote posts

	{{-- Show post comment --}}
	<hr/>
	<h3>Comments</h3>
	@if ( empty(App\Models\Comment::comments($post->id)[0]) )
		<div class="post_comment">
			There are no comments to display.
		</div>
	@else
		@foreach( App\Models\Comment::comments($post->id) as $comment)
			<div class="comment level_{{ $comment->level }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="list-inline">
							<li>{{ $comment->user()->name }}</li>
							<li class="pull-right">{{ $comment->timeElapsed() }}</li>
						</ul>
					</div>
					<div class="panel-body">
						{{ $comment->comment }}
					</div>
					<div class="panel-footer">
						<ul class="list-inline">
							<li>
								@if( App\Models\Comment::canComment($comment->level) )
									<a href="javascript:void(0)" class="ajax-show-reply">reply</a>
								@endif
							</li>
							<li>
								@if ( !Auth::guest() ) @if ( Auth::user()->type == App\Models\User::TYPE_ADMIN )
									{{ Form::open(['action' => ['CommentController@destroy',$comment->id], 'method' => 'DELETE']) }}
									{!! Form::button('delete', ['type'=>'submit', 'class' => 'btn btn-link confirm', 'data-confirm' => 'Are you sure you want to delete this comment?']) !!}</span>
									{{ Form::close() }}
								@endif @endif
							</li>
						</ul>
					</div>
				</div>
			</div>
			@if( App\Models\Comment::canComment($comment->level) )
				<div class="comment comment_reply hidden level_{{ $comment->level+1 }}">
					<div class="panel panel-default">
						<div class="panel-heading">Reply to {{ $comment->user()->name }}'s comment</div>
						<div class="panel-body">
							{!! Form::open(['action' => ['CommentController@store']]) !!}
								{!! Form::hidden('post_id',$post->id) !!}
								{!! Form::hidden('parent_id',$comment->id) !!}
								{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
								{!! Form::submit('111', ['type'=>'submit', 'class' =>'comment-submit-action hidden']) !!}
							{!! Form::close() !!}
						</div>
						<div class="panel-footer"><a href="javascript:void(0)" class="comment-submit-link">save</a></div>
					</div>
				</div>
			@endif
		@endforeach
	@endif
	@if ( !Auth::guest() )
		<hr/>
		<div class="comment comment_reply level_1">
			<div class="panel panel-default">
				<div class="panel-heading">Make a comment on the post</div>
				<div class="panel-body">
					{!! Form::open(['action' => ['CommentController@store']]) !!}
						{!! Form::hidden('post_id',$post->id) !!}
						{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
						{!! Form::submit('111', ['type'=>'submit', 'class' =>'comment-submit-action hidden']) !!}
					{!! Form::close() !!}
				</div>
				<div class="panel-footer"><a href="javascript:void(0)" class="comment-submit-link">save</a></div>
			</div>
		</div>
	@endif
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
			$('.ajax-show-reply').on('click', function () {
				$(this).parent().parent().parent().parent().parent().next('.comment_reply').toggleClass('hidden');
			});
			$('.comment-submit-link').on('click', function () {
				$(this).parent().parent().find('.comment-submit-action').click();
			});
		});
	</script>
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
	<style type="text/css">.atm-f{display: none;}</style>
@stop