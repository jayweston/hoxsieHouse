@extends('layouts.app')

@section('content')
	<h2>Post Content</h2>
	{!! Form::model($post, ['action' => ['PostController@update',$post->id], 'method'=>'PATCH']) !!}
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
			{!! Form::select('draft',['1'=>'Yes','0'=>'No'] ,null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	<h2>Upload Images</h2>
	{!! Form::open(['action' => ['PostImageController@store']]) !!}
		<div class="form-group">
			{!! Form::label('images','Images') !!}
			{!! Form::file('images[]', ['multiple'=>true]) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Upload', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	<h2>Edit Images</h2>

	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="hidden-xs hidden-sm col-md-3 col-lg-3">Post</th>
					<th class="hidden-xs col-sm-1 col-md-1 col-lg-1">order</th>
					<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Image</th>
					<th class="col-xs-9 col-sm-8 col-md-5 col-lg-5">Label</th>
					<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($post->images as $image)
					<tr>
						{!! Form::open(['action' => ['PostImageController@update', $post->id], 'method'=>'PATCH']) !!}
							<td class="hidden-xs hidden-sm col-md-3 col-lg-3">{!! Form::select('post_id',App\Models\Post::getPostTitleDropdown() ,$image->post_id, ['class' =>'form-control']) !!}</td>
							<td class="hidden-xs col-sm-1 col-md-1 col-lg-1">{!! Form::selectRange('order', 0, count($post->images), $image->order, ['class' =>'form-control']) !!}</td>
							<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><img src="/images/blog/{{ $post->id }}/{{ $image->name }}" style="max-height:90%; max-width:90%" /></td>
							<td class="col-xs-9 col-sm-8 col-md-5 col-lg-5">{!! Form::textarea('label', $image->label, ['class' =>'form-control']) !!}</td>
						{!! Form::close() !!}
						<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							{{ Form::open(['action' => ['PostImageController@destroy',$image->id], 'method' => 'DELETE']) }}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
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
