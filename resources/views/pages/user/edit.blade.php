@extends('layouts.app')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title','Edit account')
	@section('description','Site admins can use this page to edit an existing account.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop


@section('content')
	{!! Form::model($user, ['action' => ['UserController@update',$user->id], 'method'=>'PATCH']) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name', null, ['class' =>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::text('email', null, ['class' =>'form-control']) !!}
		</div>
		@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\User::TYPE_ADMIN))
		<div class="form-group">
			{!! Form::label('type','User Type') !!}
			{!! Form::select('type', $user->getUserTypesDropdown(), $user->type,['class' =>'form-control']) !!}
		</div>
		@endif @endif
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

	<div class="form-group">
		{!! Form::open(['action' => ['UserController@destroy',$user->id], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
		{!! Form::close() !!}
	</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(document).ready(function(){
			$('li').removeClass('active');
			$('#nav_account_edit').addClass('active');
			$('#nav_account_dropdown').addClass('active');
		});	
	</script>
@stop
