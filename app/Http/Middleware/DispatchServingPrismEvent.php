<?php

namespace Laravel\Nova\Http\Middleware;

use App\Events\ServingPrism;

class DispatchServingPrismEvent
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        ServingPrism::dispatch($request);

        return $next($request);
    }
}
