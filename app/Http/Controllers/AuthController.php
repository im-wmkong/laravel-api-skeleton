<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return array
     * @throws ValidationException
     */
    public function login(AuthRequest $request): array
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['username' => ['The provided credentials are incorrect.']]);
        }

        return $user->createApiToken();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        $request->user()->tokens()->delete();

        return \response()->noContent();
    }

    /**
     * @param Request $request
     * @return User
     */
    public function me(Request $request): User
    {
        return $request->user();
    }
}
