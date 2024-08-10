<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function auth(AuthRequest $request) {

        // get validated data
        $creds = $request->validated();

        // try auth
        if(!Auth::attempt($creds)) {
            return response()->json(['message', 'invalid username or password'], Response::HTTP_BAD_REQUEST);
        }

        // get user and create auth token
        $user = Auth::user();
        $token = $user->createToken('access-token')->plainTextToken;

        // return user and set token to httponly cookie
        // return response($user)->cookie('access-token', $token, 60, '/', 'localhost', true, true);
        return response()->json(['user' => $user, 'token' => $token], Response::HTTP_OK);
    }
}
