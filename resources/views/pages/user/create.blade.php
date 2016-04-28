@extends('layouts.app')

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
