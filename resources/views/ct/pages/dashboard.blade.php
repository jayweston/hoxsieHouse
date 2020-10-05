@extends('ct.layouts.app')

@section('css')
	@parent
@stop

@section('content')
	@include('ct.includes.notifications')
	@include('ct.pages.dashboard-carousel')
	@include('ct.pages.dashboard-services')
	@include('ct.pages.dashboard-about')
	@include('ct.pages.dashboard-portfolio')
	@include('ct.pages.dashboard-contact')
	@include('ct.pages.dashboard-portfolio-modals')
@endsection

@section('scripts')
	@parent
@stop
