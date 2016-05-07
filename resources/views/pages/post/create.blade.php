@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'Create post' )
	@section('description','Create new post for HoxsieHouse Blog.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	{!! Form::open(['action' => ['PostController@store']]) !!}
		<div class="form-group">
			{!! Form::label('title','Title') !!}
			{!! Form::text('title', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type','Type') !!}
			{!! Form::select('type',App\Models\Post::getPostTypesDropdown() ,null, ['class' =>'form-control','placeholder' => '...']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('summary','Summary') !!}
			{!! Form::text('summary', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('content','Content') !!}
			{!! Form::textarea('content', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('avialable_at','Publish On') !!}
			{!! Form::input('datetime', 'avialable_at', date('Y-m-d h:i:sa'), ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('draft','Draft') !!}
			{!! Form::select('draft',['1'=>'Yes','0'=>'No'] ,'1', ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Add Article', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_create').addClass('active');
			$('#nav_post_dropdown').addClass('active');
		});	
	</script>
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: '#mytextarea',
			toolbar: 'undo redo removeformat | cut copy paste | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent blockquote',
		});
	</script>
@stop