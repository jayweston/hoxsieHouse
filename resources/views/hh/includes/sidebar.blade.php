<div class="col-md-4 col-sm-5 hidden-xs"><div class="col-md-12 col-sm-12">
	<div class="row dashboard_post">
		<h4 class="text-center dashboard-side-title">Our Other Blogs</h4>
		<div class="blog_container_image">
			<a href="http://www.niteowlcreates.com/"><img src="/hh/images/banner/nite_owl.png" class="img-responsive" /></a>
		</div>
		<div class="blog_container_image">
			<a href="http://www.staciesplace.com/"><img src="/hh/images/banner/stacies_place.png" class="img-responsive" /></a>
		</div>
		<div class="blog_container_image">
			<a href="http://redcherries22.blogspot.com/"><img src="/hh/images/banner/stacies_place_original.png" class="img-responsive" /></a>
		</div>
		<div class="blog_container_image">
			<a href="http://Wedding.HoxsieHouse.com"><img src="/hh/images/banner/wedding.png" class="img-responsive" /></a>
		</div>
		@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
			<div class="blog_container_image">
				<a href="http://azhottness.blogspot.com/">Secret</a>
			</div>
		@endif @endif
	</div>
</div></div>
