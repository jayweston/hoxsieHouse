<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blogs<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/post') }}">All</a></li>
						@foreach (App\Models\Post::arrayToDropdown(App\Models\Post::getPostTypes()) as $type => $name )
							<li><a href="{{ url('/post?type='.$type) }}">{{ $name }}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							@if ((Auth::user()->type == App\Models\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\User::TYPE_WRITER))
								<li><a href="{{ url('/post/create') }}"><i class="fa fa-btn fa-sign-out"></i>Create Post</a></li>
							@endif
							<li><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}"><i class="fa fa-btn fa-sign-out"></i>Account</a></li>
							<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>
