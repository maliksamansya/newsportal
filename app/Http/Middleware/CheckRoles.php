<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $access_token = $request->header('access_token');
            if (!$access_token) {
                throw new \Exception("Unauthenticated", 401);
            }

            $payload = JwtHelper::verifyToken($access_token);

            $user = User::with('role')->find($payload['id']);

            if (!$user || $user->role->name !== 'admin') {
                throw new \Exception("Invalid Token");
            }

            // $request->merge([
            //     'user' => [
            //         'id' => $customer->id,
            //         'email' => $customer->email,
            //         'username' => $customer->username,
            //         'phoneNumber' => $customer->phoneNumber,
            //         'address' => $customer->address,
            //     ]
            // ]);

            return $next($request);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], $error->getCode());
        }
    }
}
