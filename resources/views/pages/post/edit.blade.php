@extends('layouts.app')

@section('content')

	<div class="row">
		<button onclick="selectEditImages()" class="btn btn-default pull-right">Edit Images</button>
		<button onclick="selectUpoadImages()" class="btn btn-default pull-right">Upload Images</button>
		<button onclick="selectContent()" class="btn btn-default pull-right">Content</button>
	</div>

	<div id="post_content">
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
	</div>

	<div id="upload_images">
		<h2>Upload Images</h2>
		{!! Form::open(['action' => ['PostImageController@store'], 'files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('images','Images') !!}
				{{ Form::hidden('post',$post->id) }}
				{!! Form::file('images[]', ['multiple'=>true]) !!}
				
			</div>
			<div class="form-group">
				{!! Form::submit('Upload', ['class' =>'btn btn-primary form-control upload_images']) !!}
			</div>
		{!! Form::close() !!}
	</div>

	<div id="edit_images">
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
							<td class="hidden-xs hidden-sm col-md-3 col-lg-3">{!! Form::select('post_id',App\Models\Post::getPostTitleDropdown() ,$image->post_id, ['class' =>'form-control ajax_submit', 'data-image_id'=>$image->id]) !!}</td>
							<td class="hidden-xs col-sm-1 col-md-1 col-lg-1">{!! Form::selectRange('order', 0, count($post->images), $image->order, ['class' =>'form-control  ajax_submit', 'data-image_id'=>$image->id]) !!}</td>
							<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><img src="/images/blog/{{ $post->id }}/{{ $image->name }}" style="max-height:90%; max-width:90%" /></td>
							<td class="col-xs-9 col-sm-8 col-md-5 col-lg-5">{!! Form::textarea('label', $image->label, ['class' =>'form-control  ajax_submit', 'data-image_id'=>$image->id]) !!}</td>
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
	</div>

	<div id="spinner" class="text-center">
		<img src="/images/spinner.gif" />
	</div>

@endsection

@section('scripts')
	@parent
	<script src="/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: '#mytextarea',
			toolbar: 'undo redo removeformat | cut copy paste | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent blockquote',
		});
	</script>
	<script type="text/javascript">
		$("#edit_images").hide();
		$("#upload_images").hide();
		$("#spinner").hide();

		function selectUpoadImages() {
			$("#upload_images").show();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#spinner").hide();
		}
		function selectEditImages() {
			$("#edit_images").show();
			$("#post_content").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
		}
		function selectContent() {
			$("#post_content").show();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
		}
		$('.upload_images').on('click', function () {
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").show();
		});
	</script>
	<script type="text/javascript">
		$('.ajax_submit').on('change', function()  {
			var data = {
				_method: 'PUT',
				_token: $("input[name=_token]").val(),
			};
			data[$(this).attr('name')] = $(this).val();
			$.post('/postimage/'+$(this).data('image_id'), data, function(result){
				if(result.success){
					return;
				}
				if(result.messages)  {
					var txt = '';
					$.each(result.messages, function(index, val)  {
						if(val)
							txt = txt + val + '<br>';
					});
					if(txt)
						console.log(txt);
				}
				var txt = 'There was a problem saving your response.  Please try again.'
				console.log(txt);
			})
			.error(function(){
				var txt = '404'
				console.log(txt);
			});
		});
	</script>
@stop