@extends('layouts.app')

@section('content')
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a https="href://HoxsieHouse.com"><img src="/images/banner/travel.png" class="center-block img-responsive" /></a></div>
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
			<div class="row dashboard_post dashboard-side-aboutus">
				<h4 class="text-center dashboard-side-title">About Us</h4>
				<div class="text-center"><img src="/images/static/dashboard-about-us.jpg" class="row" /></div>
				<div>We are west coast travelers wanting to document our fun times.</div>
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center dashboard-side-title">Our Story</h4>
				This is how we meet.
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center dashboard-side-title ">Stay Connected</h4>
				<a class="col-md-2 col-md-offset-1 dashboard-side-connected" data-svc="facebook" data-svc-id="TheStaciesPlace" title="Follow on Facebook" href="http://www.facebook.com/TheStaciesPlace" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
				<a class="col-md-2 dashboard-side-connected" data-svc="instagram" data-svc-id="StaciesPlace" title="Follow on Instagram" href="http://instagram.com/StaciesPlace" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
				<a class="col-md-2 dashboard-side-connected" data-svc="twitter" data-svc-id="Stacies_Place" title="Follow on Twitter" href="http://twitter.com/intent/follow?source=followbutton&amp;variant=1.0&amp;screen_name=Stacies_Place" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
				<a class="col-md-2 dashboard-side-connected" data-svc="pinterest" data-svc-id="Stacies_Place" title="Follow on Pinterest" href="http://www.pinterest.com/Stacies_Place" target="_blank"><i class="fab fa-pinterest fa-2x"></i></a>
				<a class="col-md-2 dashboard-side-connected" data-svc="snapchat" data-svc-id="staciesplace" title="Follow on Snapchat" href="https://www.snapchat.com/add/staciesplace" target="_blank"><i class="fab fa-snapchat fa-2x"></i></a>
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center dashboard-side-title">Our Other Blogs</h4>
				<div class="blog_container_image">
					<a href="http://Crafts.HoxsieHouse.com"><img src="/images/banner/nite_owl.png" class="img-responsive" /></a>
					<span>Discription of blog</span>
				</div>
				<div class="blog_container_image">
					<a href="http://StaciesPlace.HoxsieHouse.com"><img src="/images/banner/stacies_place.png" class="img-responsive" /></a>
					<span>Discription of blog</span>
				</div>
				<div class="blog_container_image">
					<a href="http://Stacie.HoxsieHouse.com"><img src="/images/banner/stacies_place_original.png" class="img-responsive" /></a>
					<span>Discription of blog</span>
				</div>
				<div class="blog_container_image">
					<a href="http://Wedding.HoxsieHouse.com"><img src="/images/banner/wedding.png" class="img-responsive" /></a>
					<span>Discription of blog</span>
				</div>
				@if (!Auth::guest()) @if (Auth::user()->type == App\Models\User::TYPE_ADMIN)
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
