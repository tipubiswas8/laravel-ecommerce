<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrderRouteCHeck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->permit == 'false'){
            return redirect()->route('products.index');
        }
        return $next($request);
    }
}
