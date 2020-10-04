@extends('ct.layouts.app')

@section('css')
	@parent
@stop

@section('content')
	@include('ct.includes.notifications')
	@include('ct.pages.single.dashboard-carousel')
	@include('ct.pages.single.dashboard-services')
	@include('ct.pages.single.dashboard-about')
	@include('ct.pages.single.dashboard-portfolio')
	@include('ct.pages.single.dashboard-contact')
	@include('ct.pages.single.dashboard-portfolio-modals')
@endsection

@section('scripts')
	@parent
@stop
