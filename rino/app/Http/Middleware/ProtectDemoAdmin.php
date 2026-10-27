<?php

namespace App\Http\Middleware;

use App\Support\DemoMode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectDemoAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! DemoMode::activeForCurrentUser()) {
            return $next($request);
        }

        // Allow browsing the panel and leaving the demo account.
        if ($request->isMethod('GET') || $request->isMethod('HEAD')) {
            return $next($request);
        }

        if ($request->is('admin/logout') && $request->isMethod('POST')) {
            return $next($request);
        }

        // Livewire calls can run Filament actions even when a button is disabled.
        // Strict protection deliberately also blocks dynamic Livewire updates.
        if ($request->is('admin') || $request->is('admin/*')
            || $request->is('livewire/update')
            || $request->is('livewire/upload-file')
            || $request->is('livewire/*')) {
            abort(403, 'This action is disabled for demo accounts.');
        }

        return $next($request);
    }
}
