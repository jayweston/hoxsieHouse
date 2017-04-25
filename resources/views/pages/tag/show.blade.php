@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', $tag->name )
	@section('description','View a tag including the posts it is in.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')

	@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\User::TYPE_WRITER))
		<h3>Change Tag</h3>
		<div class="tag-edit">
			{!! Form::model($tag, ['action' => ['TagController@update',$tag->id], 'method'=>'PATCH']) !!}
				<div class="form-group">
					{!! Form::label('name','Name') !!}
					{!! Form::text('name', null, ['class' =>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
				</div>
			{!! Form::close() !!}
		</div>

		<div class="tag-delete">
			{{ Form::open(['action' => ['TagController@destroy', $tag->id], 'method' => 'DELETE']) }}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger form-control confirm', 'data-confirm' => 'Are you sure you want to delete this tag?']) }}
			{{ Form::close() }}
		</div>
	@endif @endif

	<h3>Posts with tag: {{ $tag->getPostCount() }}</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tbody>
				@foreach ($tag->posts() as $post)
					<tr>
						<td><a href="/post/{{ $post->id }}">{{ $post->title }}</a></td>
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
			$('#nav_account_show').addClass('active');
			$('#nav_account_dropdown').addClass('active');
		});	
	</script>
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
@stop