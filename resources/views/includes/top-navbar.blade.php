<nav role="navigation" class="navbar navbar-default">
	<div id="navbarCollapse" class="collapse navbar-collapse"><div class="container"><div class="row"><div class="col-md-10 col-md-offset-1">
		{{--
			Left side dropdown for posts
		--}}
		<ul class="nav navbar-nav">
			<li class="nav_default_text"><a href="/">Home</a></li>
			<li class="nav_default_text"><a href="/post">Travel</a></li>
			<li class="nav_default_text"><a href="/about">About</a></li>
			<li class="nav_default_text"><a href="/calendars">Calendar</a></li>
		</ul>
		{{--
			Right side dropdown for users
		--}}
		<ul class="nav navbar-nav navbar-right navbar-icons">
			<li class=" hidden-xs"><a  data-svc="facebook" data-svc-id="TheStaciesPlace" title="Follow on Facebook" href="http://www.facebook.com/TheStaciesPlace" target="_blank"><i class="fab fa-2x fa-facebook"></i></a></li>
			<li class=" hidden-xs"><a  data-svc="instagram" data-svc-id="StaciesPlace" title="Follow on Instagram" href="http://instagram.com/StaciesPlace" target="_blank"><i class="fab fa-2x fa-instagram"></i></a></li>
			<li class=" hidden-xs"><a  data-svc="twitter" data-svc-id="Stacies_Place" title="Follow on Twitter" href="http://twitter.com/intent/follow?source=followbutton&amp;variant=1.0&amp;screen_name=Stacies_Place" target="_blank"><i class="fab fa-2x fa-twitter"></i></a></li>
			<li class=" hidden-xs"><a  data-svc="pinterest" data-svc-id="Stacies_Place" title="Follow on Pinterest" href="http://www.pinterest.com/Stacies_Place" target="_blank"><i class="fab fa-2x fa-pinterest"></i></a></li>
			<li class=" hidden-xs"><a  data-svc="snapchat" data-svc-id="staciesplace" title="Follow on Snapchat" href="https://www.snapchat.com/add/staciesplace" target="_blank"><i class="fab fa-2x fa-snapchat"></i></a></li>
			@if (Auth::guest())
				<li class="dropdown" id="nav_account_dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guest<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li  id="nav_login"><a href="{{ route('login').'?redirect='.Request::path() }}">Login</a></li>
						<li  id="nav_register"><a href="{{ route('register').'?redirect='.Request::path() }}">Register</a></li>
					</ul>
				</li>
			@else
				<li class="dropdown" id="nav_account_dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li  id="nav_account_list"><a href="{{ url('/unread/') }}">Unread Posts</a></li>
						<li  id="nav_account_list"><a href="{{ url('/user/') }}">View Users</a></li>
						<li  id="nav_account_show"><a href="{{ url('/user/'.Auth::user()->id) }}">Account Settings</a></li>
						<li role="separator" class="divider"></li>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\User::TYPE_WRITER))
							<li  id="nav_post_create"><a href="{{ url('/post/create') }}">Create Post</a></li>
							@if (Auth::user()->type == App\Models\User::TYPE_ADMIN)
							<li  id="nav_tag_list"><a href="{{ url('/tag/') }}">Edit Tags</a></li>
							@endif
							@if (Auth::user()->type == App\Models\User::TYPE_ADMIN)
							<li  id="nav_account_create"><a href="{{ url('/user/create') }}">Create User</a></li>
							@endif
						@endif @endif
						<li role="separator" class="divider"></li>
						<li  id="nav_logout"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</div></div></div></div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
