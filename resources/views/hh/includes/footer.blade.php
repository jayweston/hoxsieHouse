<div class="footer-section">
	<ul class="list-inline text-center footer-nav-title"><li class="list-inline-item">Navigation</li></ul>
	<ul class="list-inline text-center footer-nav-link">
		<li class="list-inline-item"><a href="{{ url('/') }}" title="Hoxsie House Blog">Home</a></li>
		<li class="list-inline-item"><a href="{{ url('/post?type=travel') }}" title="Travel Posts">Travel</a></li>
		<li class="list-inline-item"><a href="{{ url('/tos') }}" title="Terms of Service">Terms of Service</a></li>
		<li class="list-inline-item"><a href="{{ url('/privacy') }}" title="Privacy Policy">Privacy Policy</a></li>
	</ul>
	<ul class="list-inline text-center footer-nav-title"><li class="list-inline-item">Sister Sites</li></ul>
	<ul class="list-inline text-center footer-nav-link">
		<li class="list-inline-item"><a target="_blank" href="http://www.niteowlcreates.com/" title="Nite Owl Creates">Nite Owl Creates</a></li>
		<li class="list-inline-item"><a target="_blank" href="http://www.staciesplace.com/" title="Stacie's Place">Stacie's Place</a></li>
		<li class="list-inline-item"><a target="_blank" href="http://redcherries22.blogspot.com" title="Redcherries">Stacie's Place II</a></li>
		<li class="list-inline-item"><a target="_blank" href="http://wedding.hoxsiehouse.com/" title="Our Wedding">Wedding</a></li>
		@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)<li><a target="_blank" href="http://www.azhottness.blogspot.com/" title="Personal Blog">Private</a></li> @endif @endif
	</ul>
	@section('scripts')
		<script type="text/javascript" src="{{ asset('hh/js/google.analytics.min.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
	@show
</div>
