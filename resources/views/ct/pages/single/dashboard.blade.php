@extends('ct.layouts.app')

@section('css')
	@parent
@stop

@section('content')
	<div class="body-main card mx-auto">
				@include('ct.includes.notifications')
		<div id="dashboard-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="{{ asset('https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_STMT_FallPromo2020_HP_banner.jpg/jcr:content/renditions/cq5dam.web.2000.2000.jpeg') }}" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_RevoTile_MainHeader1_Updated_1440x386_banner.jpg/jcr:content/renditions/cq5dam.web.2000.2000.jpeg') }}" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Virtual_HomePage_REV3_banner.jpg/jcr:content/renditions/cq5dam.web.2000.2000.jpeg') }}" alt="Third slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Curbside_HomePage_REV_banner.jpg/jcr:content/renditions/cq5dam.web.2000.2000.jpeg') }}" alt="forth slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#dashboard-carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#dashboard-carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
	<div class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>Services</h1>
		</div>
	</div>
	<div class="container">
		<section>
			<ul class="list-group list-group-horizontal align-items-stretch flex-wrap dashboard-services">
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/1-1-ratio/DAL_Diplomacy_RES_02_LightGreyDarkGrey_2cm_web.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">XTERIORS</h4>
							<p class="card-text">Our NEW Xteriors™ program brings luxury to the outdoors - making your backyard patio, pool, or outdoor kitchen the envy of the neighborhood.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_COM_02_PierWhite_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Natural Stone</h4>
							<p class="card-text">Our broad, unrivaled selection of natural stone includes traditional tile sizes, planks, extra-large slab, and even mosaics.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Florentine_COM_01_web_270X270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Decorative</h4>
							<p class="card-text">Complete your design with flair. Select colors, textures, shapes, or patterns to coordinate with other elements for a stand-out space.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_RES_02_CU05_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Mosaics</h4>
							<p class="card-text">Perfect for pools, shower &amp; kitchen backsplashes, our assortment of ceramic, porcelain tile, glass, &amp; natural stone mosaics offers stunning style.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/REVO_RV70_PerspectiveGrey_RES_01_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">RevoTile</h4>
							<p class="card-text">Daltile proudly introduces RevoTile™, revolutionary new porcelain click together tile that installs over 2 times faster than regular tile.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Granite_BiscottiWhite_RES_01_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Tile</h4>
							<p class="card-text">Ceramic tile and porcelain tile are the foundation of our vast tile selection including subway tile, wood look tile and every tile in between.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_RetroSpace_RES_01_SucculentGreen_ModernWhite_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=270&amp;la=en&amp;w=270" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Title</h4>
							<p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						</div>
					</div>
				</li>
			</ul>
		</section>
	</div>

	<div class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>PORTFOLIO</h1>
		</div>
	</div>
	<div class="container">
		<section>
			<ul class="list-group list-group-horizontal align-items-stretch flex-wrap dashboard-services">
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/1-1-ratio/DAL_Diplomacy_RES_02_LightGreyDarkGrey_2cm_web.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">residential</h5>
					</div></div>
				</li>

				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_COM_02_PierWhite_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">commercial</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Florentine_COM_01_web_270X270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Onyx</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_RES_02_CU05_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Sandstone</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/REVO_RV70_PerspectiveGrey_RES_01_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Slate</h5>
					</div></div>
				</li>
			</ul>
		</section>
	</div>
@endsection

@section('scripts')
	@parent
@stop



