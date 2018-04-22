@extends('layouts.app')

@section('content')
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a href="http://Travel.HoxsieHouse.com"><img src="/images/banner/travel.png" /></a></div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-8 col-sm-12">
			@foreach($posts as $post)
				<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
					<div class="col-md-5"><img src="{{ $post->thumbnailPath() }}" class="img-responsive" /></div>
					<div class="col-md-7">
						<div class=""><a href="/post/{{ $post->id }}"><h3>{{ $post->title }}</h3></a></div>
						<div class="">{{ $post->description() }}</div>
						<div class="pull-bottom">{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
					</div>
				</div>
				<hr/>
			@endforeach
		</div>
		<div class="col-md-4 hidden-sm hidden-xs">
			<div class="row dashboard_post">
				<h4 class="text-center">About Us</h4>
				BlA
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center">Our Story</h4>
				BlA
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center">Stay Connected</h4>
				<a class="col-md-2 col-md-offset-1" data-svc="facebook" data-svc-id="TheStaciesPlace" title="Follow on Facebook" href="http://www.facebook.com/TheStaciesPlace" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
				<a class="col-md-2" data-svc="instagram" data-svc-id="StaciesPlace" title="Follow on Instagram" href="http://instagram.com/StaciesPlace" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
				<a class="col-md-2" data-svc="twitter" data-svc-id="Stacies_Place" title="Follow on Twitter" href="http://twitter.com/intent/follow?source=followbutton&amp;variant=1.0&amp;screen_name=Stacies_Place" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
				<a class="col-md-2" data-svc="pinterest" data-svc-id="Stacies_Place" title="Follow on Pinterest" href="http://www.pinterest.com/Stacies_Place" target="_blank"><i class="fab fa-pinterest fa-2x"></i></a>
				<a class="col-md-2" data-svc="snapchat" data-svc-id="staciesplace" title="Follow on Snapchat" href="https://www.snapchat.com/add/staciesplace" target="_blank"><i class="fab fa-snapchat fa-2x"></i></a>
			</div>
			<hr/>
			<div class="row dashboard_post">
				<h4 class="text-center">Our Other Blogs</h4>
				<div class="blog_container_image"><a href="http://Crafts.HoxsieHouse.com"><img src="/images/banner/nite_owl.png" /></a></div>
				<div class="blog_container_image"><a href="http://StaciesPlace.HoxsieHouse.com"><img src="/images/banner/stacies_place.png" /></a></div>
				<div class="blog_container_image"><a href="http://Stacie.HoxsieHouse.com"><img src="/images/banner/stacies_place_original.png" /></a></div>
				<div class="blog_container_image"><a href="http://Wedding.HoxsieHouse.com"><img src="/images/banner/wedding.png" /></a></div>
				@if (!Auth::guest()) @if (Auth::user()->type == App\Models\User::TYPE_ADMIN)
					<div class="blog_container_image"><a href="http://Private.HoxsieHouse.com">Secret</a></div>
				@endif @endif

			</div>
		</div>
	</div>
	<div class="row text-center">
		{!! $posts->render() !!}
	</div>
@endsection
