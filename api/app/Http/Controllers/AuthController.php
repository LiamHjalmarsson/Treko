<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\SignupAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function signup(SignupRequest $request, SignupAction $action): JsonResponse
    {
        $data = $action($request);
        return response()->json($data, 201);
    }

    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $data = $action($request);

        return response()->json($data, 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $token = $request->bearerToken();
        $accessToken = PersonalAccessToken::findToken($token);

        if ($accessToken) {
            $accessToken->delete();
        }

        return response()->json(["message" => "Logged out"], 200);
    }
}
