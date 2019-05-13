<?php

namespace App\Http\Middleware;

use App\Events\PrismServiceProviderRegistered;
use App\Prism\Prism;
use App\Providers\PrismServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServePrism
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, $next)
    {
        if ($this->isPrismRequest($request)) {
            app()->register(PrismServiceProvider::class);

            PrismServiceProviderRegistered::dispatch();
        }

        return $next($request);
    }

    /**
     * Determine if the given request is intended for Nova.
     *
     * @param Request $request
     * @return bool
     */
    protected function isPrismRequest(Request $request)
    {
        $path = trim(Prism::path(), '/') ?: '/';

        return $request->is($path) ||
            $request->is(trim($path . '/*', '/')) ||
            $request->is('prism-api/*');
    }
}
