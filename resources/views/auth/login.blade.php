@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
				    <div class="form-group">
				        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i>Google</a>
				            <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i>Twitter</a>
				            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i>Facebook</a>
				            <a href="{{ url('/auth/instagram') }}" class="btn btn-instagram"><i class="fa fa-instagram"></i>Instagram</a>
                            <a href="{{ url('/auth/pinterest') }}" class="btn btn-pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
                        </div>
				    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
