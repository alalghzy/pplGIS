<?php

// app/Http/Middleware/Status.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Status
{
    public function handle(Request $request, Closure $next, ...$allowedStatuses)
    {
        $user = auth()->user();

        if ($user && in_array($user->status, $allowedStatuses)) {
            return $next($request);
        }

        // Redirect or respond accordingly if the user doesn't have the required status
        return redirect(route('login.index'))->with('failed', 'Anda tidak memiliki akses!');
    }
}

