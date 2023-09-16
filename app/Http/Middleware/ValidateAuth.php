<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ValidateAuth extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  public function handle($request, Closure $next, ...$auth)
  {

    if (!auth()->user()) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $next($request);
  }
}
