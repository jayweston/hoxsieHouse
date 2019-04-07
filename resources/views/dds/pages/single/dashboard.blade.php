@extends('dds.layouts.app')

@section('content')
	<div class="card-deck">
		@foreach($pieces as $key => $piece)
				<div class="card drawings_category_card">
					<img class="card-img-top" src="/dds/images/pieces/{{ $piece->jpg }}" alt="Pencil drawing titled: {{ $piece->title }}">
					<div class="card-body">
						<h5 class="card-title">{{ $piece->title }}</h5>
						<p class="card-text">{{ $piece->summary }}</p>
						<p class="card-text"><a href="{{ $piece->title }}">link</a></p>
					</div>
				</div>

		@endforeach
	</div>
@endsection
