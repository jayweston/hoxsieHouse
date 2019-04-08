@extends('dds.layouts.app')

@section('content')
	<br/>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row piece_row">
					<img src="/dds/images/pieces/{{ $piece->jpg }}" width="100%"><br/>
				</div>
				<div class="row piece_row">
					<a target="_blank" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-facebook"></span>Share it
					</a>
					<a target="_blank" href="https://www.twitter.com/share?text={{ $piece->title }} by Jeremy Allen&amp;url={{ URL::current() }}" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-twitter"></span>Tweet it
					</a>
					<a target="_blank" href="https://www.pinterest.com/pin/create/button/?url={{ URL::current() }}&amp;media={{ URL::to('/') }}/dds/images/pieces/{{ $piece->jpg }}&amp;description={{ $piece->title }} by Jeremy Allen" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-pinterest"></span>Pin it
					</a>
				</div>
			</div>
			<div class="col">
				<div class="row piece_row"><h1>{{ $piece->title }} by Jeremy Allen</h1></div>
				<div class="row piece_row"><h5 class="text-muted">{{ $piece->summary }}</h5></div>
				<div class="row piece_row"><div class="col text-center">Cost: ${{ $piece->value }}</div></div>
				<div class="row piece_row">
					<div class="col text-center"><a href="{{ $piece->ebay }}" class="btn btn-primary @if ($piece->ebay == '#') disabled @endif" role="button">eBay</a></div>
					<div class="col text-center"><a href="{{ $piece->amazon }}" class="btn btn-primary @if ($piece->ebay == '#') disabled @endif" role="button">Amazon</a></div>
					<div class="col text-center"><a href="{{ $piece->etsy }}" class="btn btn-primary @if ($piece->ebay == '#') disabled @endif" role="button">Etsy</a></div>
				</div>
				<div class="row piece_row piece_description">{{ $piece->description }}</div>
				{{--
				<div class="row piece_row">
					@foreach($piece->getCategories() as $category)
						<div class="col">
							<a href="/drawings/pencil/{{ $category }}/" class="btn btn-outline-primary btn-sm">{{ $category }}</a>
						</div>
					@endforeach
				</div>
				--}}
			</div>
		</div>
		<div class="row piece_row">
			<div class="col d-flex justify-content-center">
				<a href="/drawings/pencil/{{ $category }}" class="btn btn-outline-primary btn-lg">
					<svg aria-hidden="true" focusable="false" role="presentation" class="piece_icon" viewBox="0 0 20 8"><path d="M4.814 7.555C3.95 6.61 3.2 5.893 2.568 5.4 1.937 4.91 1.341 4.544.781 4.303v-.44a9.933 9.933 0 0 0 1.875-1.196c.606-.485 1.328-1.196 2.168-2.134h.752c-.612 1.309-1.253 2.315-1.924 3.018H19.23v.986H3.652c.495.632.84 1.1 1.036 1.406.195.306.485.843.869 1.612h-.743z" fill="#000" fill-rule="evenodd"></path></svg>
					Back to {{ $category }}
				</a>
			</div>
		</div>

	</div>
@endsection

@section('scripts')
	@parent
@stop
