@extends('hh.layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title','Create account')
	@section('description','Site admins can use this page to create a new account.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop

@section('content')
	{!! Form::open(['action' => ['hh\UserController@store']]) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::text('email', null, ['class' =>'form-control']) !!}
		</div>
		@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
		<div class="form-group">
			{!! Form::label('type','User Type') !!}
			{!! Form::select('type', App\Models\hh\User::getUserTypesDropdown(), App\Models\hh\User::TYPE_VIEWER, ['class' =>'form-control']) !!}
		</div>
		@endif @endif
		<div class="form-group">
			{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection
@section('scripts')
	@parent
@stop
