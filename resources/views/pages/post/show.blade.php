@extends('layouts.app')

@section('content')
	@if(!Auth::guest()) @if( (Auth::user()->type == App\Models\User::TYPE_ADMIN) || (App\Models\User::isPostMine($post->id)) )
		<div class="form-group">
			<a href="/post/{{ $post->id }}/edit" class="btn btn-primary pull-left">Edit</a>
			{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'delete']) !!}	{!! Form::submit('Delete', ['class' =>'btn btn-danger pull-right']) !!}	{!! Form::close() !!}<br/>
		</div>
	@endif @endif
	<div class="post-title">{{ $post->title }}</div>
	<div class="post-images owl-carousel">
		@foreach ($post->images as $image)
			<div class="item owl-section">
				<div class="owl-label">{{ $image->label }}</div>
				<img src="/images/blog/{{ $post->id }}/{{ $image->name }}" height="300px" class="owl-image" />
			</div>
		@endforeach
	</div>
	<div class="post-content">{!! $post->content !!}</div>
@endsection

@section('css')
	@parent
	<link href="/css/owl.carousel.css" rel="stylesheet">
@stop

@section('scripts')
	@parent
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
			owl.trigger('autoplay.stop.owl')
		})

		$( "p" ).prev( ".owl-image" ).css( "width", "yellow" );
		$( "p" ).width()
	</script>
@stop
