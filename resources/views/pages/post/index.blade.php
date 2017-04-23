@extends('layouts.app')

@section('content')
	<div class="row">
	@foreach($posts as $key => $post)
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="/post/{{ $post->id }}">
				@if($key == 0)
					<img src="/images/swipe_icon.png" class="swipe_image hidden" />
				@endif
				<div class="thumbnail_transform @if($post->draft == true) post_draft @endif @if(!$post->isAvailable()) post_unAvailable @endif">
					<figure>
						<div class="thumbnail_title">{{ $post->title }}<br/>{!! date_format(date_create($post->avialable_at),"j-F-Y") !!}</div>
						<img src="{{ $post->thumbnailPath() }}" />
						<figcaption>{{ $post->description() }}</figcaption>
					</figure>
				</div>
			</a>
		</div>
	@endforeach
	</div>
		<div class="row text-center ">
			{!! $posts->render() !!}
		</div>
@endsection

@section('scripts')
	@parent
	<script src="/js/hammer.min.js"></script>
	<script>
		var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
		if (supportsTouch){
			var webDevBreak = {};
			webDevBreak.prepareForTouches = function() {
				function swipeElement(event) {
					$( ".swipe_image" ).remove();
					var swipedElement = event.target;
					if (swipedElement.className == 'thumbnail_title'){
						swipedElement.parentNode.parentNode.classList.toggle('hovered');
					}else if (swipedElement.nodeName == 'FIGCAPTION'){
						swipedElement.parentNode.parentNode.classList.toggle('hovered');
					}else if(swipedElement.nodeName == 'FIGURE'){
						swipedElement.parentNode.classList.toggle('hovered');
					}else if(swipedElement.nodeName == 'DIV'){
						swipedElement.classList.toggle('hovered');
					}
				};

				var swipeOptions = {  };
				function initTouchListeners(touchableElement) {
					var touchControl = new Hammer(touchableElement, swipeOptions);
					touchControl.on("swipeleft", swipeElement).on("swiperight", swipeElement);
				};

				var listItems = document.querySelectorAll('div.thumbnail_transform');
				for (var i = 0; i < listItems.length; i += 1) {
					initTouchListeners(listItems[i]);
				}
			}
			webDevBreak.prepareForTouchesWhenReady = function() {
				document.addEventListener("DOMContentLoaded", webDevBreak.prepareForTouches);
			};
			webDevBreak.prepareForTouchesWhenReady();
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_post_{{ $post_type }}').addClass('active');
			$('#nav_post_dropdown').addClass('active');
			if (supportsTouch){
				$( ".swipe_image" ).removeClass("hidden");
				window.setTimeout( removeSwipe, 10000 );
			}else{
				removeSwipe();				
			}

			function removeSwipe() {
				$( ".swipe_image" ).remove();
			}
		});	
	</script>
@stop