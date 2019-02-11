@extends('hh.layouts.boarder')

@section('meta-general')
	@parent
	<meta name="robots" content="noindex,nofollow" />
	@section('title','HoxsieHouse - Edit account')
	@section('description','Site admins can use this page to edit an existing account.')
@stop

@section('meta-location') @stop
@section('meta-google') @stop
@section('meta-twitter') @stop
@section('meta-facebook') @stop
@section('meta-pintrest') @stop


@section('content')
	{!! Form::model($user, ['url' => 'user/'.$user->id, 'method' => 'patch']) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name', null, ['class' =>'form-control']) !!}
		</div>
		@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN))
		<div class="form-group">
			{!! Form::label('type','User Type') !!}
			{!! Form::select('type', $user->getUserTypesDropdown(), $user->type,['class' =>'form-control']) !!}
		</div>
		@endif @endif
		<div class="form-group">
			{!! Form::submit('Save', ['class' =>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	<div class="form-group">
		{!! Form::open(['action' => ['url' => 'user/'.$user->id, 'method' => 'delete']) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-primary form-control confirm', 'data-confirm' => 'Are you sure you want to delete this account?']) !!}
		{!! Form::close() !!}
	</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
@stop
