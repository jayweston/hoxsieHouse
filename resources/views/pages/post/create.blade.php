@extends('layouts.app')

@section('content')
	{!! Form::open(['action' => ['PostController@store']]) !!}
		<div class="form-group">
			{!! Form::label('title','Title') !!}
			{!! Form::text('title', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('post_type','Type') !!}
			{!! Form::select('post_type',App\Models\Post::arrayToDropdown(App\Models\Post::getPostTypes()) ,null, ['class' =>'form-control','placeholder' => '...']) !!}
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
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: '#mytextarea',
			toolbar: 'undo redo removeformat | cut copy paste | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent blockquote',
		});
	</script>
@stop
