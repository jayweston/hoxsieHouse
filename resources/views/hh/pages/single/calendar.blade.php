@extends('hh.layouts.boarder')

@section('content')
	<div class="row text-center blog_container">
		<div class="blog_container_image"><a href="https://HoxsieHouse.com"><img src="/hh/images/banner/travel.png" class="center-block img-responsive" /></a></div>
	</div>
	<hr/>
	<div id='calendar'></div>
	
@endsection
@section('scripts')
	@parent
	<link href='/hh/calendar/fullcalendar.css' rel='stylesheet' />
	<link href='/hh/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='/hh/js/moment.min.js'></script>
	<script src='/js/jquery-2.2.4.min.js'></script>
	<script src='/hh/calendar/fullcalendar.min.js'></script>
	<script src='/hh/calendar/gcal.min.js'></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				displayEventTime: false,
				googleCalendarApiKey: 'AIzaSyDhkvojubGTn28f5S8Pf-THMulUNTcY_Xw',
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,listYear'
				},
				eventSources: [
					{
					url:'/events',
			      		color:'#83D2B0',
			      		textColor:'#004000'
					},
					{
					googleCalendarId: 'npheilr69jhcge018ar6pi22ko@group.calendar.google.com',
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
