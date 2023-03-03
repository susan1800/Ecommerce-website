<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Response;

class ApiCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->header("authorizationHeader") != 'cAoLFatq&uwec893!I2vP6L9u*Gzy7QVgJ&QB#GL'){

            return Response::json(
                [
                    'message'=>'no authorized to access this link !',
                    'success'=>false,
                    'response_code'=>'403',
                    'data'=>'',
                    ]);
        }
        return $next($request);
    }
}
