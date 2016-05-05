@extends('layouts.app')

@section('meta-general')
	<meta name="robots" content="noindex,nofollow" />
	@parent
@stop

@section('title','')
@section('description','')
@section('tags','')
@section('lat','')
@section('long','')
@section('street','')
@section('city','')
@section('zip','')
@section('country','')
@section('image','')
@section('site_name','')
@section('created_at','')

@section('content')
	{!! Form::open(['action' => ['UserController@store']]) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::text('email', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Password') !!}
			{!! Form::password('content', ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirm','Conformation') !!}
			{!! Form::password('content_confirm', ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection
