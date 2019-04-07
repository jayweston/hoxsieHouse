@extends('dds.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			Link: <a href="/drawings/pencil/{{ $piece->category }}/{{ $piece->title }}/">Link to piece</a><br/>
			value: ${{ $piece->value }}<br/>
			width: {{ $piece->width }}<br/>
			height: {{ $piece->height }}<br/>
			color: {{ $piece->getColor() }}<br/>
			category:  @foreach($piece->getCategories() as $category)<a href="/drawings/pencil/{{ $category }}/" class="drawings_piece_link">{{ $category }}</a>@endforeach<br/>
			title: {{ $piece->title }}<br/>
			sommary: {{ $piece->summary }}<br/>
			ebay: {{ $piece->ebay }}<br/>
			amazon: {{ $piece->amazon }}<br/>
			etsy: n/a<br/>
			jpg: <img src="/dds/images/pieces/{{ $piece->jpg }}" width="400"><br/>
			<br/><br/><br/><br/><br/>
		</div>
	</div>
@endsection

@section('scripts')
	@parent
@stop
