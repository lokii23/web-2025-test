<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassword
{
    public function handle($request, Closure $next)
    {
        if (!session('has_access')) {
            return redirect()->route('exam.form');
        }

        return $next($request);
    }

}
