<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('accessToken')->accessToken;

            return response()->json([
                'status'=> 'true',
                'data'  => [
                    'message'   => 'Login successfully',
                    'token'     => $token,
                    'user'      => $user
                ]
            ]);
        }
        return response()->json([
            'message'  => 'Wrong Credentials'
        ], 401);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        return response()->json([
            'status'=> 'true',
            'message'   => 'User registration successfull',
                'data'  => [
                    'user'      => $user
                ]
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'status'=> 'true',
            'message'   => 'User successfully logout',
        ]);
    }

    public function authUser(): JsonResponse
    {
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'message'   => 'Unauthorized',
            ]);
        }
        
        return response()->json([
            'status'    => 'true',
            'message'   => 'User information',
            'data'      => $user
        ]);
        
        
        
    }
}
