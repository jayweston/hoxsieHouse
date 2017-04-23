@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'Users list' )
	@section('description','View a list of all registered users on this site.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')

	@if (!Auth::guest()) @if (Auth::user()->type == App\Models\User::TYPE_ADMIN)
	<a href="/user/create" class="btn btn-success">Add User</a>
	@endif @endif
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<th>Email</th>
					@endif @endif
					<th>Date Joined</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<th>Type</th>
					@endif @endif
					<th>View</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<th>Edit</th>
					<th>Delete</th>
					@endif @endif
				</tr>
			</thead>

			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
						<td>{{ $user->email }}</td>
						@endif @endif
						<td>{{ $user->created_at->format('Y-m-d') }}</td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
						<td>{{ $user->type }}</td>
						@endif @endif
						<td><a href="/user/{{ $user->id }}/" class="btn btn-info">View</a></td>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
						<td><a href="/user/{{ $user->id }}/edit" class="btn btn-info">Edit</a></td>
						<td>
							{{ Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'DELETE']) }}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
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
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_account_list').addClass('active');
			$('#nav_account_dropdown').addClass('active');
		});	
	</script>
@stop
