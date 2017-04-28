@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
				    <div class="form-group">
				        <div class="col-md-6 col-md-offset-4">
				            <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
				            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
				        </div>
				    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
