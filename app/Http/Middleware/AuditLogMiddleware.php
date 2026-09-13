<?php

namespace App\Http\Middleware;

use App\Services\AuditService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    protected array $skip = [
        'admin/audit-logs',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->user() && ! $request->isMethod('GET') && $response->isSuccessful()) {
            foreach ($this->skip as $pattern) {
                if ($request->is($pattern.'*')) {
                    return $response;
                }
            }
            AuditService::log(
                $request->method().' '.$request->path(),
                'HTTP '.$request->method().' '.$request->path(),
                null,
                ['input' => $this->redact($request->except(['password', 'password_confirmation', '_token', '_method']))]
            );
        }

        return $response;
    }

    protected function redact(array $input): array
    {
        foreach (['password', 'token', 'secret'] as $key) {
            if (isset($input[$key])) {
                $input[$key] = '***';
            }
        }
        return $input;
    }
}