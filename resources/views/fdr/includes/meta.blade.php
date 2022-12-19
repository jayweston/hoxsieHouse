{{-- https://moz.com/blog/meta-data-templates-123 --}}
{{-- https://www.searchenginejournal.com/maximizing-your-meta-tags-for-seo-and-ctr/ --}}
{{-- http://www.9lessons.info/2014/01/social-meta-tags-for-google-twitter-and.html --}}

@section('meta-general')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title','Hoxsie House Blog')</title>
	<meta name="description" content="@yield('description','A blog detailing the life of the Hoxsie\'s. Including our travels, eatin\'s and purchases.')" />
	<meta name="keywords" content="@yield('tags','Travel, foodie, reviews, lifestyle')">
@show

@section('meta-location')
	<meta property="place:location:latitude" content="@yield('lat','35.605952')"/>
	<meta property="place:location:longitude" content="@yield('long','-117.711033')"/>
	<meta property="business:contact_data:street_address" content="@yield('street','')"/>
	<meta property="business:contact_data:locality" content="@yield('city','Ridgecrest')"/>
	<meta property="business:contact_data:postal_code" content="@yield('zip','95333')"/>
	<meta property="business:contact_data:country_name" content="@yield('country','USA')"/>
	<meta property="business:contact_data:email" content="@yield('email','stacie@hoxsiehouse.com')"/>
	<meta property="business:contact_data:website" content="{{ URL::full() }}"/>
@show

@section('meta-google') {{-- http://www.google.com/webmasters/tools/richsnippets --}}
	<meta itemprop="name" content="@yield('title','Hoxsie House Blog')"/>
	<meta itemprop="description" content="@yield('description','A blog detailing the life of the Hoxsie\'s. Including our travels, eatin\'s and purchases.')"/>
	<meta itemprop="image" content="@yield('image', \URL::to('/hh/images/blog/thumbnail.png') )"/>
@show

@section('meta-twitter') {{-- https://dev.twitter.com/docs/cards/validation/validator --}}
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@yield('site_name','Hoxsie House')"/>
	<meta name="twitter:title" content="@yield('title','Hoxsie House Blog')">
	<meta name="twitter:description" content="@yield('description','A blog detailing the life of the Hoxsie\'s. Including our travels, eatin\'s and purchases.')"/>
	<meta name="twitter:creator" content="Stacies_Place"/>
	<meta name="twitter:image:src" content="@yield('image', \URL::to('/hh/images/blog/thumbnail.png') )"/>
	<meta name="twitter:domain" content="{{ URL::full() }}"/>
@show

@section('meta-facebook') {{-- https://developers.facebook.com/tools/debug --}}
	<meta property="og:type" content="profile"/> 
	<meta property="profile:first_name" content="Stacie"/> 
	<meta property="profile:last_name" content="Skinner"/>
	<meta property="profile:username" content="TheStaciesPlace"/>
	<meta property="og:title" content="@yield('title','Hoxsie House Blog')"/>
	<meta property="og:description" content="@yield('description','A blog detailing the life of the Hoxsie\'s. Including our travels, eatin\'s and purchases.')"/>
	<meta property="og:image" content="@yield('image', \URL::to('/hh/images/blog/thumbnail.png') )"/>
	<meta property="og:url" content="{{ URL::full() }}"/>
	<meta property="og:site_name" content="@yield('site_name','Hoxsie House')"/>
	<meta property="og:see_also" content="{{ URL::to('/') }}"/>
@show

@section('meta-pintrest') {{-- https://developers.pinterest.com/docs/rich-pins/places/ --}}
	<meta property="og:type" content="article" />
	<meta property="og:title" content="@yield('title','Hoxsie House Blog')" />
	<meta property="og:description" content="@yield('description','A blog detailing the life of the Hoxsie\'s. Including our travels, eatin\'s and purchases.')" />
	<meta property="og:url" content="{{ URL::full() }}" />
	<meta property="og:site_name" content="@yield('site_name','Hoxsie House')" />
	<meta property="article:published_time" content="@yield('created_at','03-27-2011')" />
	<meta property="article:author" content="Stacies_Place" />
@show
