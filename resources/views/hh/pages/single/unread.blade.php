@extends('hh.layouts.app')

@section('content')
	@include('hh.includes.banner')
	<div class="row">
		<div class="col-md-8 col-sm-7 col-xs-10"><div class="col-md-12 col-sm-12 col-xs-12">
			@foreach($posts as $post)
				<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
					<div class="col-md-5 col-sm-5 col-xs-12"><a href="{{ $post->url }}"><img src="{{ $post->thumbnailPath() }}" class="img-responsive" /></a></div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="dashboard-post-title"><a href="{{ $post->url }}"><h3>{{ $post->title }}</h3></a></div>
						<div class="dashboard-post-description">{{ $post->description() }}</div>
					</div>
				</div>
				<hr/>
			@endforeach
		</div></div>
		@include('hh.includes.sidebar')
	</div>
	<div class="row text-center">
		{!! $posts->render() !!}
	</div>
@endsection
