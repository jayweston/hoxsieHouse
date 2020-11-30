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
		<ul class="list-group list-group-horizontal align-items-stretch flex-wrap dashboard-portfolio">
			@foreach(File::directories(public_path('ct/portfolio')) as $path)
				<li class="list-group-item border-0">
					<div class="portfolio-card-a" data-toggle="modal" data-target="#residentialModal-{{ App\Models\ct\Tile::getFolder($path) }}"><div class="card portfolio-card-b">
						<img src="{{ str_replace(public_path(), '', $path) }}/feature.jpg" class="card-img-top">
						<h5 class="card-title card-img-overlay portfolio-overlay">{{ App\Models\ct\Tile::getFolderName($path) }}</h5>
					</div></div>
				</li>

			@endforeach
		</ul>
	</section>
</div>
