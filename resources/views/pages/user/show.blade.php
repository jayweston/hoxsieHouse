@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', $user->name )
	@section('description','View a users info including their posts and comments made.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')

	<h3>User Info</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Type</th>
					<th>Date Added</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->type }}</td>
					<td>{{ $user->created_at->format('Y-m-d') }}</td>
					<td><a href="/user/{{ $user->id }}/edit" class="btn btn-info">Edit</a></td>
					<td>
						{{ Form::open(['action' => ['UserController@destroy',$user->id], 'method' => 'DELETE']) }}
						{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
						{{ Form::close() }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h3>User's Posts</h3>
	Title:
	Summary:
	link:
@endsection
@section('scripts')
	@parent
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_account_show').addClass('active');
			$('#nav_account_dropdown').addClass('active');
		});	
	</script>
@stop