@extends('dds.layouts.app')

@section('content')
	<br/>
	<div class="container">
		<div class="row">
			<div class="card-deck">
				@foreach($pieces as $key => $piece)
						<div class="card drawings_category_card">
							<a href="/drawings/pencil/{{ $category }}/{{ $piece->title }}"><img class="card-img-top" src="/dds/images/pieces/{{ $piece->jpg }}" alt="Pencil drawing titled: {{ $piece->title }}"></a>
							<div class="card-body">
								<h5 class="card-title"><a href="/drawings/pencil/{{ $category }}/{{ $piece->title }}">{{ $piece->title }}</a></h5>
								<p class="card-text">{{ $piece->summary }}</p>

							</div>
						</div>

				@endforeach
			</div>
		</div>
	</div>
@endsection
