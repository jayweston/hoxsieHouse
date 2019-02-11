@extends('hh.layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'HoxsieHouse - Users list' )
	@section('description','View a list of all registered users on this site.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')

	@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
	<a href="/user/create" class="btn btn-primary">Add User</a>
	@endif @endif
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
					<th>Email</th>
					@endif @endif
					<th>Date Joined</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
					<th>Type</th>
					@endif @endif
					<th>View</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
					<th>Edit</th>
					<th>Delete</th>
					@endif @endif
				</tr>
			</thead>

			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
						<td>{{ $user->email }}</td>
						@endif @endif
						<td>{{ $user->created_at->format('Y-m-d') }}</td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
						<td>{{ $user->type }}</td>
						@endif @endif
						<td><a href="/user/{{ $user->id }}/" class="btn btn-primary">View</a></td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
						<td><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit</a></td>
						<td>
							{{ Form::open(['url' => 'user/'.$user->id, 'method' => 'delete']) }}
							{{ Form::submit('Delete', ['class' => 'btn btn-primary confirm', 'data-confirm' => 'Are you sure you want to delete this account?']) }}
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
