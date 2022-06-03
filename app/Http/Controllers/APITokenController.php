<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class APITokenController extends Controller
{
    public function createToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (! $user ||! Hash::check($request->input('password'), $user->password)) {
            return Response::json([
                'error' => 'The provided credentials are incorrect.'
            ], 400);
        }

        $user->tokens()->delete();

        return $user->createToken($request->input('device_name'))->plainTextToken;
    }
}
