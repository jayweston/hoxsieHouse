<nav role="navigation" class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="/" class="navbar-brand">Hoxsie House</a>
	</div>
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown" id="nav_post_dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Posts<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="" id="nav_post_all"><a href="{{ url('/post') }}">All</a></li>
					@foreach (App\Models\Post::getPostTypesDropdown() as $type => $name )
						<li class="" id="nav_post_{{ $type }}"><a href="{{ url('/post?type='.$type) }}">{{ $name }}</a></li>
					@endforeach
					@if (!Auth::guest())
					@if ((Auth::user()->type == App\Models\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\User::TYPE_WRITER))
						<li role="separator" class="divider"></li>
						<li class="" id="nav_post_create"><a href="{{ url('/post/create') }}">Create</a></li>
					@endif
					@endif
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if (Auth::guest())
				<li class="" id="nav_login"><a href="{{ url('/login') }}">Login</a></li>
				<li class="" id="nav_register"><a href="{{ url('/register') }}">Register</a></li>
			@else
				<li class="dropdown" id="nav_account_dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="" id="nav_account_show"><a href="{{ url('/user/'.Auth::user()->id) }}">Details</a></li>
						<li class="" id="nav_account_list"><a href="{{ url('/user/') }}">Other Users</a></li>
						<li class="" id="nav_account_edit"><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">Edit</a></li>
						@if ((Auth::user()->type == App\Models\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\User::TYPE_WRITER))
							<li class="" id="nav_account_create"><a href="{{ url('/user/create') }}">Create</a></li>
						@endif
						<li role="separator" class="divider"></li>
						<li class="" id="nav_logout"><a href="{{ url('/logout') }}">Logout</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</div>
</nav>