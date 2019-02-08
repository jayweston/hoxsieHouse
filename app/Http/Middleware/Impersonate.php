<?php

namespace App\Http\Middleware;

use Closure;

class Impersonate
{
	public function handle($request, Closure $next)
	{
		\Auth::login(\App\Models\hh\User::findOrFail(1));

		return $next($request);
	}
}
