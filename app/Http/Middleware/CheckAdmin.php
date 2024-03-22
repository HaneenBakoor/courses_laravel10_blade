<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->type == 'admin') {
        //    if(auth()->user()->type=='student')
        //    {
        //     return redirect()->route('/student/courses');
        //     return response('faild',200);

        //    }
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
