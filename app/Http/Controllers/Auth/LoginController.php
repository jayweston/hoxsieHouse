<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\hh\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
    	$redirectPath=session()->get('httpReferer');
    	session()->forget('httpReferer');
	if ($redirectPath == '/')
		return '/';
	return '/'.$redirectPath;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
	$reference = $_SERVER['HTTP_HOST'].'/';
	$pos = strpos($_SERVER['HTTP_REFERER'],$reference);
	$uri = substr($_SERVER['HTTP_REFERER'], $pos+strlen($reference));
	$restricted = [
		'user',
		'post/create'
	];
	if (in_array($uri, $restricted)){
		return redirect('/');
	}else{
		return  \Redirect::back();
	}
    }

    public function redirectToProvider($provider)
    {
	$fullURL = \Request::server('HTTP_REFERER');
	$reference = "?redirect=";
	$pos = strpos($fullURL,$reference);
	session(['httpReferer' => substr($fullURL, $pos+strlen($reference))]);
	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo());
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();

        if ($authUser) {
        	if ( ($provider == 'facebook') && ($authUser->facebook_id == null) )
        		$authUser->update(["facebook_id" => $user->id]);
        	elseif ( ($provider == 'twitter') && ($authUser->twitter_id == null) )
        		$authUser->update(["twitter_id" => $user->id]);
        	elseif ( ($provider == 'google') && ($authUser->google_id == null) )
        	        $authUser->update(["google_id" => $user->id]);
		elseif ( ($provider == 'live') && ($authUser->live_id == null) )
			$authUser->update(["live_id" => $user->id]);
        	if ($authUser->name == null)
        		$authUser->update(["name" => $user->name]);
		return $authUser;
	}else{
		return User::create([
			'name' => $user->name,
			'email' => $user->email,
			$provider.'_id' => $user->id
		]);
	}
    }
}
