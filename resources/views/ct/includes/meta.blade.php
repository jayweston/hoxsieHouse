{{-- https://moz.com/blog/meta-data-templates-123 --}}
{{-- https://www.searchenginejournal.com/maximizing-your-meta-tags-for-seo-and-ctr/ --}}
{{-- http://www.9lessons.info/2014/01/social-meta-tags-for-google-twitter-and.html --}}

@section('meta-general')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title','Checkered Tile Classic')</title>
	<meta name="description" content="@yield('description','Tile work in Nampa, Boise, Meridian.')" />
	<meta name="keywords" content="@yield('tags','Tile')">
@show

@section('meta-google') {{-- http://www.google.com/webmasters/tools/richsnippets --}}
	<meta itemprop="name" content="@yield('title','Checkered Tile Classic')"/>
	<meta itemprop="description" content="@yield('description','Tile work in Nampa, Boise, Meridian.')"/>
	<meta itemprop="image" content="@yield('image', asset('ct/CTClassic.png') )"/>
@show

@section('meta-twitter') {{-- https://dev.twitter.com/docs/cards/validation/validator --}}
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@yield('site_name','Checkered Tile Classic')"/>
	<meta name="twitter:title" content="@yield('title','Checkered Tile Classic')">
	<meta name="twitter:description" content="@yield('description','Tile work in Nampa, Boise, Meridian.')"/>
	<meta name="twitter:creator" content="Checkered_Tile_Classic"/>
	<meta name="twitter:image:src" content="@yield('image', asset('ct/CTClassic.png') )"/>
	<meta name="twitter:domain" content="{{ URL::full() }}"/>
@show

@section('meta-facebook') {{-- https://developers.facebook.com/tools/debug --}}
	<meta property="og:type" content="profile"/> 
	<meta property="profile:first_name" content="Justin"/> 
	<meta property="profile:last_name" content="Christensen"/>
	<meta property="profile:username" content="CheckeredTileClassic"/>
	<meta property="og:title" content="@yield('title','Checkered Tile Classic')"/>
	<meta property="og:description" content="@yield('description','Tile work in Nampa, Boise, Meridian.')"/>
	<meta property="og:image" content="@yield('image', asset('ct/CT.png') )"/>
	<meta property="og:url" content="{{ URL::full() }}"/>
	<meta property="og:site_name" content="@yield('site_name','Checkered Tile Classic')"/>
	<meta property="og:see_also" content="{{ URL::to('/') }}"/>
@show

@section('meta-pintrest') {{-- https://developers.pinterest.com/docs/rich-pins/places/ --}}
	<meta property="og:type" content="article" />
	<meta property="og:title" content="@yield('title','Checkered Tile Classic')" />
	<meta property="og:description" content="@yield('description','Tile work in Nampa, Boise, Meridian.')" />
	<meta property="og:url" content="{{ URL::full() }}" />
	<meta property="og:site_name" content="@yield('site_name','Checkered Tile Classic')" />
	<meta property="article:published_time" content="@yield('created_at','02-09-2019')" />
	<meta property="article:author" content="Checkered Tile Classic" />
@show
