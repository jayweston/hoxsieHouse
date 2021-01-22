@extends('dds.layouts.app')

@section('content')
	<br/>
	<div class="container">
		<div class="row">
			<div class="card-deck">
				@foreach($pieces as $key => $piece)
					<div class="col">
						<div class="card drawings_category_card mx-auto">
							<a href="{{ url('/drawings/pencil/'.$piece->getPieceCategories()[0].'/'.str_replace(' ', '-', $piece->title)) }}"><img class="card-img-top" src="{{ asset('dds/images/pieces/'.$piece->jpg) }}" alt="Pencil drawing titled: {{ $piece->title }}"></a>
							<div class="card-body">
								<h5 class="card-title"><span><a href="{{ url('/drawings/pencil/'.$piece->getPieceCategories()[0].'/'.str_replace(' ', '-', $piece->title)) }}"> {{ $piece->title }}</span><span class="float-right">
									@if($piece->price == NULL)
										{{ $piece->value == NULL ? 'Sold' : '$'.$piece->value }}
									@else
										${{ $piece->price }}
									@endif
								</a></span></h5>
								<p class="card-text">{{ $piece->summary }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection


