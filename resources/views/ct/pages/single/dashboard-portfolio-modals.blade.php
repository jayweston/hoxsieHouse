<div id="residentialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="resModal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div id="residential-carousel" class="carousel slide" data-ride="carousel1" data-interval="5000">
				<div class="carousel-inner">
					@foreach(File::glob(public_path('ct/images').'/*') as $path)
						<div class="carousel-item @if ($loop->first) active @endif " >
							<img class="d-block w-100 mx-auto" src="{{ str_replace(public_path(), '', $path) }}" alt="">
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#residential-carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#residential-carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<ol class="carousel-indicators">
					@foreach(File::glob(public_path('ct/images').'/*') as $path)
						<li data-target="#residential-carousel" data-slide-to="{{ $loop->index }}" class="@if ($loop->first) active @endif">
							<img class="d-block w-100" src="{{ str_replace(public_path(), '', $path) }}" class="img-fluid">
						</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</div>
