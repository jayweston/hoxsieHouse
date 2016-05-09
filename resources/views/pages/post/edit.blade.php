@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'Edit: '.$post->title)
	@section('description','Edit post content, meta, and images.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	{{-- Display error messages for bad inputs --}}
	<div class="alert alert-warning alert-block hidden" id="notification_error">
		<button type="button" class="close" onclick="$('#notification_error').addClass('hidden')">&times;</button>
		<h4>Error</h4>
		<div class="notification_message"></div>
	</div>

	{{-- Buttons for what to desplay--}}
	<div class="row">
		<button onclick="selectEditImages()" class="btn btn-default pull-right post_button">Edit Images</button>
		<button onclick="selectUpoadImages()" class="btn btn-default pull-right post_button">Upload Images</button>
		<button onclick="selectMeta()" class="btn btn-default pull-right post_button">Meta</button>
		<button onclick="selectTags()" class="btn btn-default pull-right post_button">Tags</button>
		<button onclick="selectContent()" class="btn btn-default pull-right post_button">Content</button>
	</div>

	{{-- Edit post content --}}
	<div id="post_content">
		<h2>Post Content</h2>
		{!! Form::model($post, ['action' => ['PostController@update',$post->id], 'method'=>'PATCH']) !!}
			<div class="form-group">
				{!! Form::label('title','Title') !!}
				{!! Form::text('title', null, ['class' =>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('type','Type') !!}
				{!! Form::select('type',App\Models\Post::getPostTypesDropdown() ,$post->type, ['class' =>'form-control','placeholder' => '...']) !!}
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
				{!! Form::input('datetime', 'avialable_at', null, ['class' =>'form-control']) !!}
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

	{{-- Edit post meta --}}
	<div id="post_meta">
		<h2>Post Meta</h2>
			@if ( !empty($post->meta()->id) )
				{!! Form::model($post->meta(), ['action' => ['PostMetaController@update',$post->meta()->id], 'method'=>'PATCH']) !!}
			@else
				{!! Form::open(['action' => ['PostMetaController@store']]) !!}
			@endif
				{{ Form::hidden('post_id',$post->id) }}
			<div class="form-group">
				{!! Form::label('title','Title') !!}
				{!! Form::text('title', null, ['class' =>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('description','Description') !!}
				{!! Form::text('description', null, ['class' =>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('lat','Latitude') !!}
				{!! Form::text('lat', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('long','Longitude') !!}
				{!! Form::text('long', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('street','Street') !!}
				{!! Form::text('street', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('city','City') !!}
				{!! Form::text('city', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('zip','Zip') !!}
				{!! Form::text('zip', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('country','Country') !!}
				{!! Form::text('country', null, ['class' =>'form-control', 'id' =>'mytextarea']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
		@if ( !empty($post->meta()->id) )
			<div class="form-group">
				{{ Form::open(['action' => ['PostMetaController@destroy',$post->meta()->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger form-control'])}}
				{{ Form::close() }}
			</div>
		@endif
	</div>

	{{-- Upload images to post --}}
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

	{{-- Edit uploaded images --}}
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
							<td class="hidden-xs hidden-sm col-md-3 col-lg-3">{!! Form::select('post_id',App\Models\Post::getPostTitleDropdown() ,$image->post_id, ['class' =>'form-control ajax_submit', 'data-id'=>$image->id, 'data-url'=>'postimage']) !!}</td>
							<td class="hidden-xs col-sm-1 col-md-1 col-lg-1">{!! Form::select('order', $image->getOrderDropdown(), $image->order, ['class' =>'form-control  ajax_submit', 'data-id'=>$image->id, 'data-url'=>'postimage']) !!}</td>
							<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><img class="@if($image->thumbnailable() == 'true') thumbnailable @endif" src="/images/blog/{{ $post->id }}/{{ $image->name }}" style="max-height:90%; max-width:90%" /></td>
							<td class="col-xs-9 col-sm-8 col-md-5 col-lg-5">{!! Form::textarea('label', $image->label, ['class' =>'form-control  ajax_submit', 'data-id'=>$image->id, 'data-url'=>'postimage']) !!}</td>
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

	{{-- Edit post tags --}}
	<div id="edit_tags">
		<h2>Edit Tags</h2>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="col-xs-1 col-sm-2 col-md-2 col-lg-2">Order</th>
						<th class="col-xs-5 col-sm-4 col-md-4 col-lg-4">Existing Tag</th>
						<th class="col-xs-5 col-sm-4 col-md-4 col-lg-4">New Tag</th>
						<th class="col-xs-1 col-sm-2 col-md-2 col-lg-2">Delete</th>
					</tr>
				</thead>
				<tbody>
					@for($i=0; $i<10; $i++)
						<tr>
							<td class="col-xs-1 col-sm-2 col-md-2 col-lg-2">
								{!! Form::select('order',['0'=> 'N/A', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'] ,App\Models\PostTag::getPostTag($post->id ,$i+1)->order, ['class' =>'form-control ajax_submit', 'data-id'=>App\Models\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
							</td>
							<td class="col-xs-5 col-sm-4 col-md-4 col-lg-4">
								{!! Form::select('tag_id',App\Models\Tag::getTagDropdown() ,App\Models\PostTag::getTag($post->id ,$i+1)->id, ['class' =>'form-control ajax_submit', 'data-id'=>App\Models\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
							</td>
							<td class="col-xs-5 col-sm-4 col-md-4 col-lg-4">
								{!! Form::text('new_tag', null, ['class' =>'form-control ajax_submit', 'data-id'=>App\Models\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
							</td>
							<td class="col-xs-1 col-sm-2 col-md-2 col-lg-2">
								@if (App\Models\PostTag::getPostTag($post->id ,$i+1)->id != '0')
								{{ Form::open(['action' => ['PostTagController@destroy',App\Models\PostTag::getPostTag($post->id ,$i+1)->id], 'method' => 'DELETE']) }}
								{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
								{{ Form::close() }}
								@endif
							</td>
						</tr>
					@endfor
				</tbody>
			</table>
		</div>
	</div>

	{{-- Spinner --}}
	<div id="spinner" class="text-center">
		<img src="/images/spinner.gif" />
	</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_{{ $post->type }}').addClass('active');
			$('#nav_post_dropdown').addClass('active');
		});	
	</script>
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
		$("#post_meta").hide();
		$("#post_tags").hide();

		function selectUpoadImages() {
			$("#upload_images").show();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#post_tags").hide();
		}
		function selectEditImages() {
			$("#edit_images").show();
			$("#post_content").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#post_tags").hide();
		}
		function selectContent() {
			$("#post_content").show();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#post_tags").hide();
		}
		function selectMeta() {
			$("#post_meta").show();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#post_tags").hide();
		}
		function selectTags() {
			$("#post_tags").show();
			$("#post_meta").hide();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
		}
		$('.upload_images').on('click', function () {
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").show();
			$("#post_meta").hide();
		});
	</script>
	<script type="text/javascript">
		$('.ajax_submit').on('change', function()  {
			var data = {
				_method: 'PUT',
				_token: $("input[name=_token]").val(),
			};
			data[$(this).attr('name')] = $(this).val();
			$.post('/'+$(this).data('url')+'/'+$(this).data('id'), data, function(result){
				if(result.success){
					return;
				}
				if(result.messages)  {
					var txt = '';
					$.each(result.messages, function(index, val)  {
						if(val)
							txt = txt + val + '<br>';
					});
					if(!txt)
						txt = 'There was a problem saving your response.  Please try again.';
					$('.notification_message').html('');
					$('.notification_message').html(txt);
					$('#notification_error').removeClass('hidden');
				}
			})
			.error(function(){
				var txt = 'There was a problem saving your response.  Please try again.';
				$('.notification_message').html('');
				$('.notification_message').html(txt);
				$('#notification_error').removeClass('hidden');
			});
		});
	</script>
@stop