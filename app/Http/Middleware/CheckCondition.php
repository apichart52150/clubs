<?php
namespace App\Http\Middleware;

use Closure;
use Session;

class CheckCondition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('condition')) {
            return redirect('/condition');
        }

        return $next($request);
    }
}