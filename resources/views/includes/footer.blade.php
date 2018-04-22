<div class="footer-section">
	<ul class="list-inline text-center">Navigation</ul>
	<ul class="list-inline text-center">
		<li><a href="{{ url('/') }}" id="nav_travel" class="nav_site" title="Hoxsie House Blog">Home</a></li>
		<li><a href="{{ url('/post?type=travel') }}" id="nav_travel" class="nav_site" title="Travel Posts">Travel</a></li>
		<li><a href="{{ url('/tos') }}" id="nav_travel" class="nav_site" title="Terms of Service">Terms of Service</a></li>
		<li><a href="{{ url('/privacy') }}" id="nav_travel" class="nav_site" title="Privacy Policy">Privacy Policy</a></li>
	</ul>
	<ul class="list-inline text-center">Sister Sites</ul>
	<ul class="list-inline text-center">
		<li><a target="_blank" href="http://crafts.hoxsiehouse.com/" id="site_craft" class="sister_site" title="Nite Owl Creates">Nite Owl Creates</a></li>
		<li><a target="_blank" href="http://stacieplace.hoxsiehouse.com/" id="site_stacie" class="sister_site" title="Stacie's Place">Stacie's Place</li>
		<li><a target="_blank" href="http://travel.hoxsiehouse.com/" id="site_travel" class="sister_site" title="Tony & Stacie Travel">Travel</a></li>
		<li><a target="_blank" href="http://stacie.hoxsiehouse.com/" id="site_redcherries" class="sister_site" title="Redcherries">Red Cherries</a></li>
		<li><a target="_blank" href="http://wedding.hoxsiehouse.com/" id="site_wedding" class="sister_site" title="Our Wedding">Wedding</a></li>
		@if (!Auth::guest()) @if (Auth::user()->type == App\Models\User::TYPE_ADMIN)<li><a target="_blank" href="http://private.hoxsiehouse.com/" id="site_private" class="sister_site" title="Personal Blog">Private</a></li> @endif @endif
	</ul>
	@section('scripts')
		<script type="text/javascript" src="/js/google.analytics.min.js"></script>
		<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	@show
</div>
