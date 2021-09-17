<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\UserService;
use App\Validate\UserValidate;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $validate;
    protected $service;

    public function __construct(UserService $userService, UserValidate $userValidate)
    {
        $this->validate = $userValidate;
        $this->service = $userService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->respondWithToken($token, $user);
    }


    public function register(Request $request)
    {
        $validate = $this->validate->validarUser($request);
        if($validate->fails()) {
            return response()->json($validate->messages());
        }
        $credentials = $request->only(['email', 'password']);
        $this->service->store($request);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->respondWithToken($token, $user);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh(), '');
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $user)
    {

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'tipo' => $user->tipo,
            'site_id' => $user->site_id,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 1000
        ]);
    }

}
