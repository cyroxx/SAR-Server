<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ApiAuth
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::setRequest($request);
            JWTAuth::parseToken()->authenticate();

        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'AUTHENTICATION_TOKEN_EXPIRED'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'AUTHENTICATION_TOKEN_INVALID'], 401);

        } catch (JWTException $e) {
            return response()->json(['error' => 'AUTHENTICATION_TOKEN_MISSING'], 400);
        }

        return $next($request);
    }
}
