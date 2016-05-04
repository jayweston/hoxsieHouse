{{-- https://moz.com/blog/meta-data-templates-123 --}}
{{-- https://www.searchenginejournal.com/maximizing-your-meta-tags-for-seo-and-ctr/ --}}
{{-- http://www.9lessons.info/2014/01/social-meta-tags-for-google-twitter-and.html --}}

@section('meta-general')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title','')</title>
	<meta name="description" content="@yield('description','')" />
	<meta name="keywords" content="@yield('tags','')">
@show

@section('meta-location')
	<meta property="place:location:latitude" content="@yield('lat','')"/>
	<meta property="place:location:longitude" content="@yield('long','')"/>
	<meta property="business:contact_data:street_address" content="@yield('street','')"/>
	<meta property="business:contact_data:locality" content="@yield('city','')"/>
	<meta property="business:contact_data:postal_code" content="@yield('zip','')"/>
	<meta property="business:contact_data:country_name" content="@yield('country','')"/>
	<meta property="business:contact_data:email" content="@yield('email','')"/>
	<meta property="business:contact_data:website" content="{{ URL::full() }}"/>
@show

@section('meta-google') {{-- http://www.google.com/webmasters/tools/richsnippets --}}
	<meta itemprop="name" content="@yield('title','')"/>
	<meta itemprop="description" content="@yield('description','')"/>
	<meta itemprop="image" content="@yield('image','')"/> {{-- png 250x250 --}}
@show

@section('meta-twitter') {{-- https://dev.twitter.com/docs/cards/validation/validator --}}
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@yield('site_name','')"/>
	<meta name="twitter:title" content="@yield('title','')">
	<meta name="twitter:description" content="@yield('description','')"/>
	<meta name="twitter:creator" content="Stacies_Place"/>
	<meta name="twitter:image:src" content="@yield('image','')"/>
	<meta name="twitter:domain" content="{{ URL::full() }}"/>
@show

@section('meta-facebook') {{-- https://developers.facebook.com/tools/debug --}}
	<meta property="og:type" content="profile"/> 
	<meta property="profile:first_name" content="Stacie"/> 
	<meta property="profile:last_name" content="Skinner"/>
	<meta property="profile:username" content="TheStaciesPlace"/>
	<meta property="og:title" content="@yield('title','')"/>
	<meta property="og:description" content="@yield('description','')"/>
	<meta property="og:image" content="@yield('image','')"/>
	<meta property="og:url" content="{{ URL::full() }}"/>
	<meta property="og:site_name" content="@yield('site_name','')"/>
	<meta property="og:see_also" content="{{ URL::to('/') }}"/>
@show

@section('meta-pintrest') {{-- https://developers.pinterest.com/docs/rich-pins/places/ --}}
	<meta property="og:type" content="article" />
	<meta property="og:title" content="@yield('title','')" />
	<meta property="og:description" content="@yield('description','')" />
	<meta property="og:url" content="{{ URL::full() }}" />
	<meta property="og:site_name" content="@yield('site_name','')" />
	<meta property="article:published_time" content="@yield('created_at','')" />
	<meta property="article:author" content="Stacies_Place" />
@show