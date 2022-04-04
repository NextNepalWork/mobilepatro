<?php

namespace App\Http\Middleware;

use App\Models\Backend\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Usercheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $privilege = Auth::user();
        $data = $privilege->privilege;
        if ($data != 1) {
            return redirect()->back()->with('error', 'You are restricted');
        }

        return $next($request);
    }
}
