@extends('ct.layouts.app')

@section('css')
	@parent
@stop

@section('content')
	<div id="home" class="body-main card mx-auto">
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


	<div id="services" class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>Services</h1>
			<div class="dashboard-section">
				<span class="outer-line"></span>
				<span class="fas fa-check fa-3x" aria-hidden="true"></span>
				<span class="outer-line"></span>
			</div>
		</div>
	</div>
	<div class="container">
		<section>
			<ul class="list-group list-group-horizontal align-items-stretch flex-wrap dashboard-services">
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/ceramic.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Ceramic Tile</h4>
							<p class="card-text">Ceramic tile is made from clay and other natural resources. It's chosen often because it's durable and works well in virutally every room in the house. A popular type includes terra cotta, which can be a glazed tile or unglazed quarry tile, and used as floor tiles as well as subway tile, which is often used as shower tiles and for kitchen walls. </p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/porcelain.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Porcelain Tile</h4>
							<p class="card-text">Made from clay and other natural resources, and fired at a higher temperature, porcelain is one popular and versatile tile option available. </p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/quarry.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Quarry Tile</h4>
							<p class="card-text">One of the most common misconceptions homeowners (and even some contractors) have about quarry tile is that it comes from quarry. </p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/mosaic.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Mosaic Tile</h4>
							<p class="card-text">One of the most popular types of tile backsplash, mosaic tile is often seen in bathrooms and the kitchen but can be installed anywhere throughout the home. Typically, these are glass tiles made of pieces of glass in various colors and formed into a pattern with mesh backing.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/stone.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Stone Tile</h4>
							<p class="card-text">No one denies ceramic’s ability to withstand the test of time, but you can’t argue with the fact that natural stone is the most durable type of floor tile. </p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/marble.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Marble Tile</h4>
							<p class="card-text">There’s no doubt about the fact that marble is one of the most exquisite types of floor tile. It’s been used by architects and designers throughout all of human history. </p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/granite.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Granite Tile</h4>
							<p class="card-text">f you need to install tiles in an area with heavy foot traffic, then you should recommend your client to opt for granite tile. They will thank you later for this suggestion. One of the things that make granite tiles stand apart is their resistance to acids. Moreover, due to their light and small forms, granite tiles are easy to measure and work with.</p>
						</div>
					</div>
				</li>
				<li class="list-group-item border-0">
					<div class="card my-3">
						<img src="{{ asset('ct/images/limestone.jpg') }}" class="card-img-top">
						<div class="card-body">
							<h4 class="card-title">Limestone Tile</h4>
							<p class="card-text">One of the things that make limestone tile stand apart the different types of floor tile is its unique appearance. They look very similar to wood, making them an excellent alternative for homeowners who are looking for something a bit different.</p>
						</div>
					</div>
				</li>
			</ul>
		</section>
	</div>


	<div id="about" class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>About Checkered Tile</h1>
			<div class="dashboard-section">
				<span class="outer-line"></span>
				<span class="fas fa-users fa-3x" aria-hidden="true"></span>
				<span class="outer-line"></span>
			</div>
			<h4>Treasure Valley’s Custome Tile Contractor</h4>
		</div>
	</div>
	<div class="container mt-4">
		<section>
			<ul class="list-unstyled">
				<li class="mb-5">
					<div class="row align-items-center">
						<div class="col-2"><i class="fa fa-check-circle fa-5x" aria-hidden="true"></i></div>
						<div class="col-10">
							<h4>We Are Bonded and Insured</h4>
							<div>
								<p>Checkered Tile is a fully licensed, bonded, and insured tile company. Established in 2020, Checkered Tile is a locally owned company.</p>
								<p>Idaho Contractors lic ########</p>
							</div>						
						</div>
					</div>
				</li>
				<li>
					<div class="row align-items-center">
						<div class="col-2"><i class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i></div>
						<div class="col-10">
							<h4>Satisfaction Guaranteed</h4>
							<div>
								<p>Checkered Tile takes pride in our track record of expertise, integrity, and customer satisfaction.</p>
								<p>We are committed to delivering quality service to our clients’ satisfaction and within their budgets. Some of our clients have also left us with written testimonies, confirming their satisfaction with our work.</p>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<div class="wpb_wrapper">
				<h3 style="text-align: center;">Tile Installation for Caynon and Ada Counties</h3>
				<h5 style="text-align: center;">We service these Cities:</h5>
			</div>
			<ul class="list-group list-group-horizontal align-items-stretch flex-wrap dashboard-cities">
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Boise</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Nampa</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Kuna</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Meridian</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Caldwell</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Eagle</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Star</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Hidden Springs</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Garden City</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Middleton</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Wilder</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Parma</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Notus</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Melba</span>
				</li>
				<li class="list-group-item border-0">
					<i class="fa fa-check-circle" aria-hidden="true"></i><span class="dashboard-city">Greenleaf</span>
				</li>
			</ul>
		</section>
	</div>


	<div id="portfolio" class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>PORTFOLIO</h1>
			<div class="dashboard-section">
				<span class="outer-line"></span>
				<span class="fas fa-box fa-3x"></span>
				<span class="outer-line"></span>
			</div>
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
						<h5 class="card-title card-img-overlay portfolio-overlay">Kitchen</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_RES_02_CU05_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Bathroom</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/DAL_Fonte_RES_02_CU05_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Entry Way</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/REVO_RV70_PerspectiveGrey_RES_01_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Mud Room</h5>
					</div></div>
				</li>
				<li class="list-group-item border-0">
					<div class="portfolio-card-a"><div class="card portfolio-card-b">
						<img src="https://digitalassets.daltile.com/content/dam/Daltile/website/images/homepage/REVO_RV70_PerspectiveGrey_RES_01_web_270x270.jpg/jcr:content/renditions/cq5dam.web.570.570.jpeg?h=170&amp;la=en&amp;w=170" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">Outdoor masonry</h5>
					</div></div>
				</li>
			</ul>
		</section>
	</div>



	<div id="contact" class="component rich-text col-xs-12">
        	<div class="dashboard-header">
			<h1>Contact Us</h1>
			<div class="dashboard-section">
				<span class="outer-line"></span>
				<span class="fas fa-envelope fa-3x"></span>
				<span class="outer-line"></span>
			</div>
		</div>
	</div>
	<div class="container dashboard-contact">
		<section>
			<div class="row align-items-center">
				<div class="col-6 text-center">
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#QuoteModal">Request Quote</button>
				</div>
				<div class="col-6 text-center">
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ContactModal">Contact Us</button>
				</div>
			</div>
		</section>
	</div>
	<div id="QuoteModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Request Quote</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['url' => 'quote', 'method' => 'post']) !!}
						<div class="form-group">
							{!! Form::label('title','Name') !!}
							{!! Form::text('title','',['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('ctype','Contact Type') !!}<br/>
							<span>E-mail</span> {!! Form ::radio('ctype','email') !!}
							<span>Text</span> {!! Form ::radio('ctype','text') !!}
							<span>Voice</span> {!! Form ::radio('ctype','phone') !!}
							<span>Facebook</span> {!! Form ::radio('ctype','facebook') !!}
						</div>
						<div class="form-group">
							{!! Form::label('contact','Contact Info') !!}
							{!! Form::text('contact','', ['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('ptype','Project Type') !!}
							{!! Form::text('ptype','', ['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('timeframe','Project Timeframe') !!}<br/>
							<span>Immeditely</span> {!! Form ::radio('timeframe','0') !!}
							<span>1-4 Weeks</span> {!! Form ::radio('timeframe','1') !!}
							<span>1-6 Months</span> {!! Form ::radio('timeframe','2') !!}
							<span>6+ Months</span> {!! Form ::radio('timeframe','3') !!}
						</div>
						<div class="form-group">
							{!! Form::label('description','Description') !!}
							{!! Form::textarea('description', null, ['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Submit', ['class' =>'btn btn-info']) !!}
							<button type="button" class="btn btn-info float-right" data-dismiss="modal">Close</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div id="ContactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Contact Checkered Tile</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['url' => 'contact', 'method' => 'post']) !!}
						<div class="form-group">
							{!! Form::label('title','Name') !!}
							{!! Form::text('title','',['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('ctype','Contact Type') !!}<br/>
							<span>E-mail</span> {!! Form ::radio('ctype','email') !!}
							<span>Text</span> {!! Form ::radio('ctype','text') !!}
							<span>Voice</span> {!! Form ::radio('ctype','phone') !!}
							<span>Facebook</span> {!! Form ::radio('ctype','facebook') !!}
							<span>None</span> {!! Form ::radio('ctype','none') !!}
						</div>
						<div class="form-group">
							{!! Form::label('contact','Contact Info') !!}
							{!! Form::text('contact','', ['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description','Description') !!}
							{!! Form::textarea('description', null, ['class' =>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Submit', ['class' =>'btn btn-info']) !!}
							<button type="button" class="btn btn-info float-right" data-dismiss="modal">Close</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@parent
@stop
