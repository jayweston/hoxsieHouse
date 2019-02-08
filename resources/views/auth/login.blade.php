@extends('hh.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body at-follow-tbx-element">
			<div class="form-group col-centered">
		                <a href="{{ url('/auth/google') }}" class="login_icon img at300b" title="Login via Google"><img src="/hh/images/icon/mail/gmail.png" /></a>
		                <a href="{{ url('/auth/twitter') }}" class="login_icon img at300b" title="Login via Twitter"><img src="/hh/images/icon/social/twitter.png" /></a>
		                <a href="{{ url('/auth/facebook') }}" class="login_icon img at300b" title="Login via Facebook"><img src="/hh/images/icon/social/facebook.png" /></a>
		                <a href="{{ url('/auth/instagram') }}" class="login_icon img at300b" title="Login via Instagram"><img src="/hh/images/icon/social/instagram.png" /></a>
		                <a href="{{ url('/auth/pinterest') }}" class="login_icon img at300b" title="Login via Pinterest"><img src="/hh/images/icon/social/pinterest.png" /></a>
		                <a href="{{ url('/auth/live') }}" class="login_icon img at300b" title="Login via Microsoft"><img src="/hh/images/icon/mail/hotmail.png" /></a>
		                <a href="{{ url('/auth/yahoo') }}" class="login_icon img at300b" title="Login via Yahoo"><img src="/hh/images/icon/mail/yahoo.png" /></a>
		                <div class="atclear"></div>
			</div>
                </div>
                 <div class="panel-footer login-footer">
                 	Note: All login methods are linked together by the email address associated with the service provider except for Instagram and Pinterest (which do not provide email addresses).  If you would like your Instagram or Pinterest login linked to another account, please email stacie@hoxsiehouse.com.
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
