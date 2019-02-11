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
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a href="https://HoxsieHouse.com"><img src="/hh/images/banner/travel.png" class="center-block img-responsive" /></a></div>
	</div>
	<div class="post-box"><h4 class="post-box-title"><span>Tags</span></h4></div>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Times Used</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\hh\User::TYPE_WRITER))
						<th>Edit</th>
						<th>Delete</th>
					@endif @endif
				</tr>
			</thead>

			<tbody>
				@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->name }}</td>
						<td><a href="/tag/{{ $tag->id }}" class="btn btn-primary">{{ $tag->cnt }}</a></td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\hh\User::TYPE_WRITER))
							<td><a href="/tag/{{ $tag->id }}" class="btn btn-primary">Edit</a></td>
							<td>
								{{ Form::open(['action' => ['hh\TagController@destroy', $tag->id], 'method' => 'DELETE']) }}
								{{ Form::submit('Delete', ['class' => 'btn btn-primary confirm', 'data-confirm' => 'Are you sure you want to delete this tag?']) }}
								{{ Form::close() }}
							</td>
						@endif @endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
@section('scripts')
	@parent
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
@stop
