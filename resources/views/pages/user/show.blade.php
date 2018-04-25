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
	<div class="post-box"><h4 class="post-box-title"><span>User Info</span></h4></div>
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
					<td><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit</a></td>
					<td>
						{{ Form::open(['action' => ['UserController@destroy',$user->id], 'method' => 'DELETE']) }}
						{{ Form::submit('Delete', ['class' => 'btn btn-primary confirm', 'data-confirm' => 'Are you sure you want to delete this account?']) }}
						{{ Form::close() }}
					</td>
					@endif @endif
				</tr>
			</tbody>
		</table>
	</div>
	<div class="post-box"><h4 class="post-box-title"><span>Posts</span></h4></div>
	@if ( !empty( App\Models\User::getUserPosts($user->id)[0] ) )

		<div class="col-md-12 col-sm-12 col-xs-12" id="post-paginate">
			@foreach (App\Models\User::getUserPosts($user->id) as $post)
			<ol>
				<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
					<div class="col-md-5 col-sm-5 col-xs-12"><a href="/post/{{ $post->id }}"><img src="{{ $post->thumbnailPath() }}" class="img-responsive" /></a></div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="dashboard-post-title"><a href="/post/{{ $post->id }}"><h3>{{ $post->title }}</h3></a></div>
						<div class="dashboard-post-description">{{ $post->description() }}</div>
						<div class="dashboard-post-date">{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
					</div>
				</div>
				<hr/>
			</ol>
			@endforeach
		</div>

	@else
		N/A
	@endif
	<div class="post-box"><h4 class="post-box-title"><span>Comments</span></h4></div>
	@if ( !empty( App\Models\User::getUserComments($user->id)[0] ) )
		
			@foreach (App\Models\User::getUserComments($user->id) as $comment)
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-8 col-xs-7 @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
						<div class="col-md-5 col-sm-5 hidden-xs"><a href="/post/{{ $comment->post()->id }}"><img src="{{ $comment->post()->thumbnailPath() }}" class="img-responsive" /></a></div>
						<div class="col-md-7 col-sm-7 col-xs-12 user-show-comments">
							<div class="dashboard-post-title"><a href="/post/{{ $comment->post()->id }}"><h3>{{ $comment->post()->title }}</h3></a></div>
							<div class="dashboard-post-description">{{ $comment->post()->description() }}</div>
							<div class="dashboard-post-date">{!! date_format(date_create($comment->post()->avialable_at),"j-F-Y") !!}</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-5">
						{{ $comment->comment }}
					</div>
				</div>
				<div class="clearfix"></div>
				<hr/>
			@endforeach
		
	@else
		N/A
	@endif
@endsection
@section('scripts')
	@parent
	<script src="/js/easy.paginate.js"></script>
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
