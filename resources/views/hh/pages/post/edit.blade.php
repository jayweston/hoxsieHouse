@extends('hh.layouts.boarder')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title', 'HoxsieHouse - Edit: '.$post->title)
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
		<button onclick="selectEditImages()" class="btn btn-primary pull-right post_button">Edit Images</button>
		<button onclick="selectUpoadImages()" class="btn btn-primary pull-right post_button">Upload Images</button>
		<button onclick="selectMeta()" class="btn btn-primary pull-right post_button">Meta</button>
		<button onclick="selectTags()" class="btn btn-primary pull-right post_button">Tags</button>
		<button onclick="selectContent()" class="btn btn-primary pull-right post_button">Content</button>
	</div>

	{{-- Edit post content --}}
	<div id="post_content">
		<h2>Post Content</h2>
		{!! Form::model(['url' => 'post/'.$post->id, 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::label('title','Title') !!}
				{!! Form::text('title', null, ['class' =>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('type','Type') !!}
				{!! Form::select('type',App\Models\hh\Post::getPostTypesDropdown() ,$post->type, ['class' =>'form-control','placeholder' => '...']) !!}
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
					<input class="form-control" name="avialable_at" type="datetime" id="avialable_at" value="{{$post->avialable_at}}" />
				</div>
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
			@if (!empty($post->meta()->id))
				{!! Form::model(['url' => 'postmeta/'.$post->meta()->id, 'method' => 'patch']) !!}
			@else
				{!! Form::open(['url' => 'postmeta/', 'method' => 'post']) !!}
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
				{{ Form::open(['url' => 'postmeta/'.$post->meta()->id, 'method' => 'delete']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-primary form-control confirm', 'data-confirm' => 'Are you sure you want to delete this post?']) }}
				{{ Form::close() }}
			</div>
		@endif
	</div>

	{{-- Upload images to post --}}
	<div id="upload_images">
		<h2>Upload Images</h2>
		{!! Form::open(['url' => 'postimage/', 'method' => 'post','files'=>true]) !!}
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
						<th class="hidden-xs col-sm-1 col-md-1 col-lg-1">Thumbnail</th>
						<th class="hidden-xs col-sm-1 col-md-2 col-lg-2">Location</th>
						<th class="col-xs-2 col-sm-2 col-md-3 col-lg-3">Image</th>
						<th class="col-xs-9 col-sm-7 col-md-5 col-lg-5">Label</th>
						<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Delete</th>
					</tr>
				</thead>
				<tbody>
					{{ Form::open(['url' => 'postimage/'.$post->id, 'method' => 'patch']) }}
						@foreach ($post->images as $image)
							<tr>
								<td class="hidden-xs col-sm-1 col-md-1 col-lg-1">{{ Form::radio('Thumbnail', $image->id, $image->thumbnail, []) }}</td>
								<td class="hidden-xs col-sm-1 col-md-2 col-lg-2">/hh/images/blog/{{ $post->id }}/{{ $image->name }}</td>
								<td class="col-xs-2 col-sm-2 col-md-3 col-lg-3"><img src="/hh/images/blog/{{ $post->id }}/{{ $image->name }}" style="max-height:90%; max-width:90%" /></td>
								<td class="col-xs-9 col-sm-8 col-md-5 col-lg-5">{!! Form::text($image->id."_label", $image->label, []) !!}</td>
								<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">{{ Form::checkbox($image->id."_delete", $image->id, '0', []) }}</td>
							</tr>
						@endforeach
						{{ Form::submit('Update', ['class' => 'btn btn-primary form-control']) }}
					{{ Form::close() }}
				</tbody>
			</table>
		</div>
	</div>

	{{-- Edit post tags --}}
	<div id="edit_tags">
		<h2>Edit Tags</h2>
		{!! Form::open(['url' => 'posttag/'.$post->id, 'method' => 'patch']) !!}
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Order</th>
							<th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">Existing Tag</th>
							<th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">New Tag</th>
						</tr>
					</thead>
					<tbody>
						@for($i=0; $i<10; $i++)
							<tr>
								<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
									{!! Form::select($i.'[]',['0'=> 'Remove', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'] ,$i+1, ['class' =>'form-control', 'data-id'=>App\Models\hh\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
								</td>
								<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
									{!! Form::select($i.'[]',App\Models\hh\Tag::getTagDropdown() ,App\Models\hh\PostTag::getTag($post->id ,$i+1)->id, ['class' =>'form-control', 'data-id'=>App\Models\hh\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
								</td>
								<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
									{!! Form::text($i.'[]', null, ['class' =>'form-control', 'data-id'=>App\Models\hh\PostTag::getPostTag($post->id ,$i+1)->id, 'data-url'=>'posttag']) !!}
								</td>
							</tr>
						@endfor
					</tbody>
				</table>
			</div>
			{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
		{{ Form::close() }}
	</div>

	{{-- Spinner --}}
	<div id="spinner" class="text-center">
		<i class="fas fa-spinner fa-pulse fa-3x"></i>
	</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="/hh/js/moment.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap/transition.js"></script>
	<script type="text/javascript" src="/js/bootstrap/collapse.js"></script>
	<script type="text/javascript" src="/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript"> $(function () { $('#datetimepicker').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'}); }); </script>
	<script src="/hh/js/tinymce/tinymce.min.js"></script>
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
	<script type="text/javascript">
		$("#edit_images").hide();
		$("#upload_images").hide();
		$("#spinner").hide();
		$("#post_meta").hide();
		$("#edit_tags").hide();

		function selectUpoadImages() {
			$("#upload_images").show();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#edit_tags").hide();
		}
		function selectEditImages() {
			$("#edit_images").show();
			$("#post_content").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#edit_tags").hide();
		}
		function selectContent() {
			$("#post_content").show();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#post_meta").hide();
			$("#edit_tags").hide();
		}
		function selectMeta() {
			$("#post_meta").show();
			$("#post_content").hide();
			$("#edit_images").hide();
			$("#upload_images").hide();
			$("#spinner").hide();
			$("#edit_tags").hide();
		}
		function selectTags() {
			$("#edit_tags").show();
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
			$("#edit_tags").hide();
		});
	</script>
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
@stop
