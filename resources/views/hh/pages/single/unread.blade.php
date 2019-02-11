@extends('hh.layouts.app')

@section('content')
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a https="href://HoxsieHouse.com"><img src="/hh/images/banner/travel.png" class="center-block img-responsive" /></a></div>
	</div>
	<hr/>
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
		<div class="col-md-4 col-sm-5 hidden-xs"><div class="col-md-12 col-sm-12">
			<div class="row dashboard_post">
				<h4 class="text-center dashboard-side-title">Our Other Blogs</h4>
				<div class="blog_container_image">
					<a href="http://Crafts.HoxsieHouse.com"><img src="/hh/images/banner/nite_owl.png" class="img-responsive" /></a>
				</div>
				<div class="blog_container_image">
					<a href="http://StaciesPlace.HoxsieHouse.com"><img src="/hh/images/banner/stacies_place.png" class="img-responsive" /></a>
				</div>
				<div class="blog_container_image">
					<a href="http://Stacie.HoxsieHouse.com"><img src="/hh/images/banner/stacies_place_original.png" class="img-responsive" /></a>
				</div>
				<div class="blog_container_image">
					<a href="http://Wedding.HoxsieHouse.com"><img src="/hh/images/banner/wedding.png" class="img-responsive" /></a>
				</div>
				@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
					<div class="blog_container_image">
						<a href="http://Private.HoxsieHouse.com">Secret</a>
						<span>Discription of blog</span>
					</div>
				@endif @endif
			</div>
		</div></div>
	</div>
	<div class="row text-center">
		{!! $posts->render() !!}
	</div>
@endsection
