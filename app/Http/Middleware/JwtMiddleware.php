<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use App\User;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware {

    protected function user() {
        return JWTAuth::parseToken()->authenticate();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $accessToken = $request->header('authorization');
            $User = $this->user();
            $token = str_replace('Bearer ', '', $accessToken);
            $userToken = User::where('access_token', $token)->first();
            if ($accessToken !== 'Bearer ' .  @$userToken->access_token) {
                return response()->json(['success' => false, 'error' => ['message' => 'expire token']], 401);
            }
        } catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['success' => false, 'error' => ['message' => 'expire token']], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['success' => false, 'error' => ['message' =>'expire token']], 401);                
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return response()->json(['success' => false, 'error' => ['message' => 'Invalid token']], 401);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Invalid require token']], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => $e->getMessage()]], 422);
        }
        return $next($request);
    }

}
