@extends('hh.layouts.boarder')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'HoxsieHouse - Tag list' )
	@section('description','View a list of all rtags used on this site.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	@include('hh.includes.banner')
	<div class="post-box"><h4 class="post-box-title"><span>Locatoins</span></h4></div>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Times Used</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($metas as $meta)
					<tr>
						<td>{{ $meta->name }}</td>
						<td><a href="/location/{{ $meta->name }}" class="btn btn-primary">{{ $meta->cnt }}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
@section('scripts')
	@parent
@stop
