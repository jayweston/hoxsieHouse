<div class="footer-section">
	<div class="footer-social container">
        	<div class="h5 mb-3">Follow Checkered Tile Online</div>
    	
		<ul class="h2 list-inline">
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-facebook"></i></a></li>
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-instagram"></i></a></li>
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-pinterest"></i></a></li>
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-twitter"></i></a></li>
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-youtube"></i></a></li>
			<li class="list-inline-item mr-3"><a href="{{ url('/blank') }}" title="Placeholder link"><i class="fab fa-linkedin"></i></a></li>
		</ul>
	</div>
{{--
	<div class="footer-sitemap container">
		<div class="container px-3 py-3">
			<div class="row">
				<div class="col mx-1 d-none d-sm-block">
					<div class="mb-3">QUICK LINKS</div>
					<div>1</div>
					<div>2</div>
				</div>
				<div class="col mx-1">
					<div class="mb-3">ABOUT US</div>
					<div>Contact Us</div>
					<div>Service Area</div>
					<div>Request Quote</div>
				</div>
				<div class="col mx-1">
					<div class="mb-3">PORTFOLIO</div>
					<div>residential</div>
					<div>Onyx</div>
					<div>Sandstone</div>
					<div>Slate</div>
				</div>
			</div>
		</div>
	</div>
--}}
	<div class="footer-copyright container">
		<div class="copyright-text">© Copyright 2020 Checkered Tile. All Rights Reserved.</div>
	</div>
	@section('scripts')
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
		<script>
			$(window).resize(function () {
				$('.body-main').css('padding-top', parseInt($('#main-navbar').css("height")));
			});

			$(document).ready(function(){
				$('.body-main').css('padding-top', parseInt($('#main-navbar').css("height")));
			});
		</script>
		<script>
			$(document).ready(function() {
				var pathname = window.location.hash;
				if (pathname == '') pathname = '#home';
				$('.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
			})
			$(document).ready(function(){
				$('.navbar-nav li').click(function(){
					$('.navbar-nav li').removeClass('active');
					$(this).addClass('active');
					$('.navbar-collapse').collapse('hide');
				});
			});
		</script>
	@show
</div>
