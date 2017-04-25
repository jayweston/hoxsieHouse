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
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<th>Email</th>
					@endif @endif
					<th>Date Joined</th>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<th>Type</th>
					<th>Edit</th>
					<th>Delete</th>
					@endif @endif
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ $user->name }}</td>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<td>{{ $user->email }}</td>
					@endif @endif
					<td>{{ $user->created_at->format('Y-m-d') }}</td>
					@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
					<td>{{ $user->type }}</td>
					<td><a href="/user/{{ $user->id }}/edit" class="btn btn-info">Edit</a></td>
					<td>
						{{ Form::open(['action' => ['UserController@destroy',$user->id], 'method' => 'DELETE']) }}
						{{ Form::submit('Delete', ['class' => 'btn btn-danger confirm', 'data-confirm' => 'Are you sure you want to delete this account?']) }}
						{{ Form::close() }}
					</td>
					@endif @endif
				</tr>
			</tbody>
		</table>
	</div>
	<h3>User's Posts</h3>
	@if ( !empty( App\Models\User::getUserPosts($user->id)[0] ) )
		<div id="post-paginate">
			@foreach (App\Models\User::getUserPosts($user->id) as $post)
				<ol>
					Title: <a href="/post/{{ $post->id }}">{{ $post->title }}</a><br/>
					Post Type: <a href="/post?type={{$post->id }}">{{ $post->type }}</a><br/>
					Summary: {{ $post->summary }}
				</ol>
			@endforeach
		</div>
	@else
		N/A
	@endif
	<h3>User's Comments</h3>
	@if ( !empty( App\Models\User::getUserComments($user->id)[0] ) )
		<div id="comment-paginate">
			@foreach (App\Models\User::getUserComments($user->id) as $comment)
				<ol>
					Post: <a href="/post/{{ $comment->post()->id }}">{{ $comment->post()->title }}</a><br/>
					Comment: {{ $comment->comment }}<br/><br/>
				</ol>
			@endforeach
		</div>
	@else
		N/A
	@endif
@endsection
@section('scripts')
	@parent
	<script src="/js/easy.paginate.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_account_show').addClass('active');
			$('#nav_account_dropdown').addClass('active');
		});	
	</script>
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
	<script type="text/javascript">
		$('#post-paginate').easyPaginate({
			paginateElement: 'ol',
			elementsPerPage: 5,
			prevButton: false,
			nextButton: false,
			lastButton: false,
			firstButton: false,
			effect: 'climb'
		});
		$('#comment-paginate').easyPaginate({
			paginateElement: 'ol',
			elementsPerPage: 5,
			prevButton: false,
			nextButton: false,
			lastButton: false,
			firstButton: false,
			effect: 'climb'
		});
	</script>
@stop
