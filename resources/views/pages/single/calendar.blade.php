@extends('layouts.app')

@section('content')
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a href="https://HoxsieHouse.com"><img src="/images/banner/travel.png" class="center-block img-responsive" /></a></div>
	</div>
	<hr/>
	<div id='calendar'></div>
	
@endsection
@section('scripts')
	@parent
	<link href='/calendar/fullcalendar.css' rel='stylesheet' />
	<link href='/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='/js/moment.min.js'></script>
	<script src='/js/jquery-2.2.4.min.js'></script>
	<script src='/calendar/fullcalendar.min.js'></script>
	<script src='/calendar/gcal.min.js'></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,listYear'
				},
				displayEventTime: false,
				eventSources: [
					{
					url:'/events',
			      		color:'#83D2B0',
			      		textColor:'#004000'
					},
					{
					url:'/events',
			      		color:'#004000',
			      		textColor:'#83D2B0'
					}
				],
				eventClick: function(event) {
					if (event.url) {
						window.open(event.url);
						return false;
					}
				},
				loading: function(bool) {
					$('#loading').toggle(bool);
				},
			});
		});
	</script>
@endsection
