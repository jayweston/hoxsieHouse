<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
    protected $redirectTo = '/1';

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
		return '/'.$redirectPath;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return \Redirect::back();
    }

    public function redirectToProvider($provider)
    {
		$fullURL = \Request::server('HTTP_REFERER');
		$reference = "?redirect=";
		$pos = strpos($fullURL, $reference);
		session(['httpReferer' => substr($fullURL, $pos+strlen($reference))]);
		return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo().'/');
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
			elseif ( ($provider == 'yahoo') && ($authUser->yahoo_id == null) )
				$authUser->update(["yahoo_id" => $user->id]);
			elseif ( ($provider == 'live') && ($authUser->live_id == null) )
				$authUser->update(["live_id" => $user->id]);

        	if ($authUser->name == null)
        		$authUser->update(["name" => $user->name]);
            return $authUser;
        }elseif ($provider == 'instagram'){
            $authUser = User::where('instagram_id', $user->id)->first();
            if ($authUser){
                return $authUser;
            }else{
                return User::create([
                    'name' => $user->name,
                    $provider.'_id' => $user->id
                ]);                
            }
        }elseif ($provider == 'pinterest'){
            $authUser = User::where('pinterest_id', $user->id)->first();
            if ($authUser){
                return $authUser;
            }else{
                return User::create([
                    'name' => $user->name,
                    $provider.'_id' => $user->id
                ]);                
            }
        }else{    
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                $provider.'_id' => $user->id
            ]);
        }
    }    
}