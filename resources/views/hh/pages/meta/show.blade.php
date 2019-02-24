@extends('hh.layouts.boarder')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'HoxsieHouse - '.$slug )
	@section('description','View a tag including the posts it is in.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	@include('hh.includes.banner')
	<div class="col-md-12 col-sm-12 col-xs-12">
		@foreach ($posts as $post)
			<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
				<div class="col-md-5 col-sm-5 col-xs-12"><a href="/{{ $post->url }}"><img src="{{ $post->thumbnailPath() }}" class="img-responsive" /></a></div>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="dashboard-post-title"><a href="/{{ $post->url }}"><h3>{{ $post->title }}</h3></a></div>
					<div class="dashboard-post-description">{{ $post->description() }}</div>
					<div class="dashboard-post-date">{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
				</div>
			</div>
			<hr/>
		@endforeach
	</div>
@endsection
@section('scripts')
	@parent
@stop
