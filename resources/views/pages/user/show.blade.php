@extends('layouts.app')

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
