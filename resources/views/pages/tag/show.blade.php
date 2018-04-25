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
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a href="http://Travel.HoxsieHouse.com"><img src="/images/banner/travel.png" class="center-block img-responsive" /></a></div>
	</div>
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
			{{ Form::submit('Delete', ['class' => 'btn btn-primary form-control confirm', 'data-confirm' => 'Are you sure you want to delete this tag?']) }}
			{{ Form::close() }}
		</div>
	@endif @endif
	<div class="tag-head-box">	
		<span>Browsing Tag</span>
		<h1>{{ $tag->name }}</h1>
		<div class="pull-right">
			<span >Posts with tag</span>
			<h1>{{ $tag->getPostCount() }} </h1>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		@foreach ($tag->posts() as $post)
			<div class="row @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
				<div class="col-md-5 col-sm-5 col-xs-12"><a href="/post/{{ $post->id }}"><img src="{{ $post->thumbnailPath() }}" class="img-responsive" /></a></div>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="dashboard-post-title"><a href="/post/{{ $post->id }}"><h3>{{ $post->title }}</h3></a></div>
					<div class="dashboard-post-description">{{ $post->description() }}</div>
					<div class="dashboard-post-date">{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
				</div>
			</div>
			<hr/>
		@endforeach
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
