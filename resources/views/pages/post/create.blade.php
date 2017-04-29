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
			<label for="avialable_at">Publish On</label>
			<div class='input-group date' id='datetimepicker'>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
				<input class="form-control" name="avialable_at" type="datetime" id="avialable_at" />
			</div>
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
	<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/js/moment.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap/transition.js"></script>
	<script type="text/javascript" src="/js/bootstrap/collapse.js"></script>
	<script type="text/javascript" src="/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript"> $(function () { $('#datetimepicker').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'}); }); </script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_create').addClass('active');
			$('#nav_admin_dropdown').addClass('active');
		});	
	</script>

	<script>
		tinymce.init({
			selector: '#mytextarea',
			toolbar: 'undo redo removeformat | cut copy paste | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent blockquote',
		});
	</script>
@stop