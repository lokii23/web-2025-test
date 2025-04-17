<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPassword
{
    public function handle(Request $request, Closure $next)
    {
        $subject = $request->route('subject');

        if (!session("has_access_$subject")) {
            return redirect()->route('exam.form', ['subject' => $subject])->withErrors(['password' => 'Access denied.']);
        }

        return $next($request);
    }
}
