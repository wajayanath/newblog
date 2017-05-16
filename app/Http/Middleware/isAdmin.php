<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{

    public function handle($request, Closure $next)
    {
        //return $next($request);
        if ($user = $request->user())
        {
            if ($user->role->name == 'Administrator') 
            {
               return $next($request);
            }
        }
        return redirect('/');
    }
}
