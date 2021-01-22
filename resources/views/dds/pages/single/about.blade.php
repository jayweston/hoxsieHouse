@extends('dds.layouts.app')

@section('image',asset('dds/images/JeremyAllen.jpg'))

@section('content')
	<br/>
	<div class="container">
		<div class="row">
			<div class="col about_title">
				<h1 class="d-flex justify-content-center">Jeremy Allen</h1>	
			</div>
		</div>
		<div class="row">
			<div class="col about_image">
				<span class="d-flex justify-content-center"><img src="{{ asset('dds/images/JeremyAllen.jpg') }}" alt="Self portrait pencil drawing of the author (Jeremy Allen)." /></span>
			</div>
		</div>
		<div class="row">
			<div class="about_bio">
				<p>In the late summer of 2014, Jeremy was on top of his world. He was soon to celebrate the birth of his fourth child. One day at work noticed a slight blur spot in his vision. Thinking it was more than a flaw in his contact he disregarded it. The following day he changed out the contact for a new one. Not only did this not solve the distortion, he was shocked to realize the blur was larger. Over the coming months the blur enveloped most of his vision in his right eye. After visiting every specialist in the area he finally found a specialist from Canada who was able to pinpoint the problem and put an end to the blindness that now left him legally blind. Late one night as he held his 1-1/2 year old son, studying every line upon his little chubby face, hot tears burned his cheeks as he offered up a sincere pray to have Heavenly Father preserve what vision he had remaining so that he could live to see his grandchildren one day.</p>
				<p>Years later Jeremy has found a deep appreciation for the sight God has given him and does all he can to share his joy with his artwork. When asked how his blindness has effected his artwork, Jeremy joyfully replies, "My handicap is a blessing. I never valued life before as I do now. I am grateful for what I can see. Though it takes me longer to complete my artwork, slowing down has tremendously improved my God given talent. I don't know how much longer I will have my vision, it can go at any point, so while I can I will share my world with as many people as I can to hopefully lift as many spirits as I can. That’s what art does for me and hopefully it helps to brighten other people's days. Just remember, enjoy all you have and if God takes away something or someone in your life, it is his way of giving you a wake-up call. You'd better enjoy each and every blessing while you have them.</p>
			</div>
		</div>
	</div>
@endsection
