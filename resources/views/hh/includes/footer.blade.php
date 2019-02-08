<div class="footer-section">
	<ul class="list-inline text-center footer-nav-title">Navigation</ul>
	<ul class="list-inline text-center footer-nav-link">
		<li><a href="{{ url('/') }}" title="Hoxsie House Blog">Home</a></li>
		<li><a href="{{ url('/post?type=travel') }}" title="Travel Posts">Travel</a></li>
		<li><a href="{{ url('/tos') }}" title="Terms of Service">Terms of Service</a></li>
		<li><a href="{{ url('/privacy') }}" title="Privacy Policy">Privacy Policy</a></li>
	</ul>
	<ul class="list-inline text-center footer-nav-title">Sister Sites</ul>
	<ul class="list-inline text-center footer-nav-link">
		<li><a target="_blank" href="http://www.niteowlcreates.com/" title="Nite Owl Creates">Nite Owl Creates</a></li>
		<li><a target="_blank" href="http://stacieplace.hoxsiehouse.com/" title="Stacie's Place">Stacie's Place</li>
		<li><a target="_blank" href="http://redcherries22.blogspot.com" title="Redcherries">Stacie's Place II</a></li>
		<li><a target="_blank" href="https://hoxsiehouse.com/" title="Tony & Stacie Travel">Travel</a></li>
		<li><a target="_blank" href="http://wedding.hoxsiehouse.com/" title="Our Wedding">Wedding</a></li>
		@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)<li><a target="_blank" href="http://www.azhottness.blogspot.com/" title="Personal Blog">Private</a></li> @endif @endif
	</ul>
	@section('scripts')
		<script type="text/javascript" src="hh/js/google.analytics.min.js"></script>
		<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	@show
</div>
