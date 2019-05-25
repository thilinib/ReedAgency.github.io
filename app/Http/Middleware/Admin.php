<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param array $params
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next, ...$params)
    {

        if (auth('admin')->check()) {

            if (!empty($params)) {
                $roles = auth('admin')->user()->roles;

                // check if the user has roles
                if ($roles->count()) {

                    foreach ($params as $role) {

                        if ($roles->pluck('name')->contains($role)) {
                            return $next($request);
                        }
                    }
                }
            } else {
                return $next($request);
            }
        }

        throw new AuthenticationException('Unauthenticated.', ['admin'], route('admin.login-form'));

    }
}
