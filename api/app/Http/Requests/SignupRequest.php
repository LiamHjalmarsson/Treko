<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => "required",
            "last_name" => "required",
            "username" => "required|unique:users",
            "email" => "required|unique:users|email",
            "password" => "required|confirmed|min:8",
            "avatar" => "nullable|string",
            "role" => "nullable|string",
        ];
    }
}


        $token = $user->createToken('auth_token')->plainTextToken;