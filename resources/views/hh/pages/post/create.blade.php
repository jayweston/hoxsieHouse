@extends('hh.layouts.boarder')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'HoxsieHouse - Create post' )
	@section('description','Create new post for HoxsieHouse Blog.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	{!! 	Form::open(['url' => 'post/copy', 'method' => 'post']) !!}
		<div class="form-group">
			{!! Form::label('website','Website') !!}
			{!! Form::text('website', 'http://tonystacietravelblog.blogspot.com', ['class' =>'form-control', 'maxlength' => '1000', 'minlength' => '4']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Copy Article', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	{!! Form::open(['url' => 'post', 'method' => 'post']) !!}
		<div class="form-group">
			{!! Form::label('title','Title') !!}
			{!! Form::text('title', null, ['class' =>'form-control', 'maxlength' => '255', 'minlength' => '4']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type','Type') !!}
			{!! Form::select('type',App\Models\hh\Post::getPostTypesDropdown() ,'travel', ['class' =>'form-control','placeholder' => '...']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('summary','Summary') !!}
			{!! Form::text('summary', null, ['class' =>'form-control', 'maxlength' => '255', 'minlength' => '4']) !!}
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
	<script type="text/javascript" src="/hh/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/hh/js/moment.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap/transition.js"></script>
	<script type="text/javascript" src="/js/bootstrap/collapse.js"></script>
	<script type="text/javascript" src="/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript"> $(function () { $('#datetimepicker').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss', defaultDate: new Date()}); }); </script>
	<script type="text/javascript">
		tinymce.init({
			selector: '#mytextarea',
			height: 500,
			theme: 'modern',
			plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
			toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
			image_advtab: true,
			templates: [
				{ title: 'Test template 1', content: 'Test 1' },
				{ title: 'Test template 2', content: 'Test 2' }
			],
			content_css: [
				'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
				'//www.tinymce.com/css/codepen.min.css'
			]
		});
	</script>
@stop
