@extends('hh.layouts.app')

@section('content')

	<div class="row text-center blog_container">
		<h3>Crafts, Reviews, and Giveaways</h3>
		<div class="blog_container_image"><a href="http://Crafts.HoxsieHouse.com"><img src="/hh/images/banner/nite_owl.png" /></a></div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Dessert For A Year Giveaway!
			</div>
			<div class="dashboard_post_snipit">
				Welcome to the 'Dessert For A Year' Giveaway! If you live in Utah, know someone in Utah, or plan on coming to Utah in the future, you need to know about CrEATe. It is located in Sandy, UT at 9305 South Village Shop Drive, across from WalMart and Hobby Lobby and neighbors with Cafe Rio.  Open for less than 6 months, they already have an average 5-star rating on Yelp! Starting in June, they are introducing their Organic Shaved Ice, different from ordinary shaved ice because all the syrups are organic with no chemical additives!
			</div>
		</div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Beef - It's What's For Dinner [Review]
			</div>
			<div class="dashboard_post_snipit">
				It's no secret - I love eating meat! Hamburgers and steaks are my favorite as well as chicken. Recently I had the opportunity to try Jones Creek Beef here in Utah. They raise all their cows from birth to harvest so they can control what is being consumed, to ensure they only have access to open grazing, exercise, direct sunlight and fresh air.
			</div>
		</div>
	</div>
	<div class="row text-center blog_container">
		<h3>Thoughts, Ideas, and Life Stories</h3>
		<div class="blog_container_image"><a href="http://StaciesPlace.HoxsieHouse.com"><img src="/hh/images/banner/stacies_place.png" /></a></div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Dessert For A Year Giveaway!
			</div>
			<div class="dashboard_post_snipit">
				It's no secret - I love eating meat! Hamburgers and steaks are my favorite as well as chicken. Recently I had the opportunity to try Jones Creek Beef here in Utah. They raise all their cows from birth to harvest so they can control what is being consumed, to ensure they only have access to open grazing, exercise, direct sunlight and fresh air.
			</div>
		</div>
	</div>
	<div class="row text-center blog_container">
		<h3>Lifestyle and Reviews</h3>
		<div class="blog_container_image"><a href="http://Stacie.HoxsieHouse.com"><img src="/hh/images/banner/stacies_place_original.png" /></a></div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Dessert For A Year Giveaway!
			</div>
			<div class="dashboard_post_snipit">
				It's no secret - I love eating meat! Hamburgers and steaks are my favorite as well as chicken. Recently I had the opportunity to try Jones Creek Beef here in Utah. They raise all their cows from birth to harvest so they can control what is being consumed, to ensure they only have access to open grazing, exercise, direct sunlight and fresh air.
			</div>
		</div>
	</div>
	<div class="row text-center blog_container">
		<h3>Our Travels</h3>
		<div class="blog_container_image"><a href="https://HoxsieHouse.com"><img src="/hh/images/banner/travel.png" /></a></div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Dessert For A Year Giveaway!
			</div>
			<div class="dashboard_post_snipit">
				It's no secret - I love eating meat! Hamburgers and steaks are my favorite as well as chicken. Recently I had the opportunity to try Jones Creek Beef here in Utah. They raise all their cows from birth to harvest so they can control what is being consumed, to ensure they only have access to open grazing, exercise, direct sunlight and fresh air.
			</div>
		</div>
	</div>
	<div class="row text-center blog_container">
		<h3>Our Wedding</h3>
		<div class="blog_container_image"><a href="http://Wedding.HoxsieHouse.com"><img src="/hh/images/banner/wedding.png" /></a></div>
		<div class="dashboard_post">
			<div class="dashboard_post_date pull-right">
				15 May 2016
			</div>
			<div class="dashboard_post_title">
				Dessert For A Year Giveaway!
			</div>
			<div class="dashboard_post_snipit">
				It's no secret - I love eating meat! Hamburgers and steaks are my favorite as well as chicken. Recently I had the opportunity to try Jones Creek Beef here in Utah. They raise all their cows from birth to harvest so they can control what is being consumed, to ensure they only have access to open grazing, exercise, direct sunlight and fresh air.
			</div>
		</div>
	</div>
	@if (!Auth::guest()) @if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
	<div class="row">
		<div class=""><a href="http://Private.HoxsieHouse.com">Secret</a></div>
		<div class="title"></div>
	</div>
	@endif @endif
@endsection
