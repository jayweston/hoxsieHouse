@extends('dds.layouts.app')

@section('content')
	<br/>
	<div class="container">
		<div class="row"><img class="card-img-top dashboard_banner" src="{{ asset('/dds/images/dds_logo_cutout.png') }}" alt="Pencil drawing the words 'Delightful Drawings Studio'" /></div>
		<div class="row">
			<div class="col align-self-center">
				<ul class="list-unstyled text-center">
					<li class="dashboard_social_icons"><a href="https://www.facebook.com/DelightfulDrawingsStudio/" target="_blank" title="Delightful Drawings Studio's official Facebook page"><span class="fa fa-facebook fa-3x"></span></a></li>
					<li class="dashboard_social_icons"><a href="{{ url('/blank') }}" title="Placeholder link"><span class="fab fa-3x fa-instagram"></span></a></li>
					<li class="dashboard_social_icons"><a href="{{ url('/blank') }}" title="Placeholder link"><span class="fab fa-3x fa-pinterest-p"></span></a></li>
					<li class="dashboard_social_icons"><a href="{{ url('/blank') }}" title="Placeholder link"><span class="fab fa-3x fa-patreon"></span></a></li>
				</ul>
			</div>
			<div class="col-10">
				<div class="card-deck">
					@foreach(App\Models\dds\Drawing::SITE_CATEGORIES as $key => $category)
						<div class="card dashboard_category_card mx-auto">
							<h5 class="mx-auto"><a href="{{ url('/drawings/pencil/'.$category) }}"> {{ $category }}</a></h5>
							<a href="{{ url('/drawings/pencil/'.$category) }}">
								<div id="{{ $category }}carousel" class="carousel slide" data-ride="carousel" data-interval="{{ 3000+$key*rand(3000,10000) }}">
									<div class="carousel-inner">
										@foreach(App\Models\dds\Drawing::getCategoryImages($category) as $key => $jpg)
											<div class="carousel-item {{ $key == 0 ? 'active': '' }}">
												<img class="d-block w-100" src="{{ asset('dds/images/pieces/'.$jpg) }}" alt="First slide">
											</div>
										@endforeach
									</div>
									<a class="carousel-control-prev" href="#{{ $category }}carousel" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#{{ $category }}carousel" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
