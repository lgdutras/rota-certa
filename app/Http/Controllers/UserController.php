<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request, User $user) {
        if (! $user->create($request->validated())) {
            return response()->json(['message' => 'Failed to create user'], 500);
        }

        return response()->json(['message' => 'User created successfully'], 201);
    }
}