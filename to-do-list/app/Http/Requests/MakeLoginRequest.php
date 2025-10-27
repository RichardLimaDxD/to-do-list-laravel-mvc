<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class MakeLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function tryToLogin(): bool
    {
        $user = User::query()
            ->where('email', '=', $this->email)
            ->first();

        if (!$user)
            return false;

        $validatedPassword = Hash::check($this->password, $user->password);

        if (!$validatedPassword)
            return false;

        auth()->login($user);

        return true;
    }
}
