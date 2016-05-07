@extends('layouts.app')

@section('content')
	<div class="row">
	@foreach($posts as $post)
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="thumbnail_transform @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
				<figure>
					<div class="thumbnail_title">{{ $post->title }}<br/>{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
					<a href="/post/{{ $post->id }}"><img src="{{ $post->thumbnailPath() }}" /></a>
					<a href="/post/{{ $post->id }}"><figcaption>{{ $post->description() }}</figcaption></a>
				</figure>
			</div>
		</div>
	@endforeach
	</div>
		<div class="row text-center ">
			{!! $posts->render() !!}
		</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_{{ $post_type }}').addClass('active');
			$('#nav_post_dropdown').addClass('active');
		});	
	</script>
@stop