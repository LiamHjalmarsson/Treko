<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(SignupRequest $request): JsonResponse {
        $validated = $request->validated();

        $user = User::create([
            "first_name" => $validated["first_name"],
            "last_name" => $validated["last_name"],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar' => $validated['avatar'] ?? null,
            'role' => 'member',
        ]);

        return response()->json([
            'user' => new UserResource($user),
            'token' => "token",
        ], 201);
    }

    public function login(Request $request) {
        return response()->json(["s" => "ss"]);
    }

    public function logout(Request $requests) {
        return response()->json(["s" => "ss"]);
    }
}
