<?php

namespace App\Http\Middleware;

use Closure;

class Impersonate
{
	public function handle($request, Closure $next)
	{
		$id = 0;
		if ($request->getHttpHost() == '127.0.11.1:8000')
			$id=1;
		elseif ($request->getHttpHost() == '127.0.11.2:8000')
			$id=2;
		elseif ($request->getHttpHost() == '127.0.11.3:8000')
			$id=3;
		\Auth::login(\App\Models\hh\User::findOrFail($id));

		return $next($request);
	}
}
