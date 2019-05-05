<?php

namespace App\Http\Middleware;

use App\Facades\Prism;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;

class VisitorLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());
        $visitor = Visitor::create([
            'ip'         => $request->getClientIp(),
            'user_agent' => $request->userAgent(),
            'path'       => $request->path(),
            'title'      => Prism::getTitle(),
            'location'   => '无',
            'browser'    => $agent->browser($agent->getUserAgent()),
            'is_robot'   => $agent->isRobot($agent->getUserAgent()),
            'device'     => $agent->device($agent->getUserAgent()),
            'languages'  => implode(',', $agent->languages()),
            'route'      => Route::currentRouteName() ?? '',
        ]);
        Log::info('visitor', $visitor->toArray());

        return $response;
    }
}
