<?php

namespace App\Http\Middleware;

use Closure;

class Impersonate
{
	public function handle($request, Closure $next)
	{
		\Auth::login(\App\Models\User::findOrFail(1));

		return $next($request);
	}
}
