<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request){
        return response()->json('login');
    }

    public function register(RegisterRequest $request){

        $user = User::create($request->all());
        return response()->json([
            'message'   => 'User registration successfull',
            'user'      => $user
        ]);
    }
}
