@extends('hh.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body at-follow-tbx-element">
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/auth/google') }}" class="login_icon img at300b" title="Login via Google"><img src="/hh/images/icon/mail/gmail.png" /></a>
                        <a href="{{ url('/auth/twitter') }}" class="login_icon img at300b" title="Login via Twitter"><img src="/hh/images/icon/social/twitter.png" /></a>
                        <a href="{{ url('/auth/facebook') }}" class="login_icon img at300b" title="Login via Facebook"><img src="/hh/images/icon/social/facebook.png" /></a>
                        <a href="{{ url('/auth/live') }}" class="login_icon img at300b" title="Login via Microsoft"><img src="/hh/images/icon/mail/hotmail.png" /></a>
                        <div class="atclear"></div>
                    </div>
                </div>
                <div class="login-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
