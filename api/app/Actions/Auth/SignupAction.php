<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupAction
{
    public function __invoke(SignupRequest $request)
    {
        $validated = $request->safe();

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar' => $validated['avatar'],
            'role' => 'member',
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => new UserResource($user),
            'token' => $token,
        ];
    }
}
