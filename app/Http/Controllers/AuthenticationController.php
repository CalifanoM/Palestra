<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        try {
            $token = auth()->login($user);
        }
        catch (JWTException $e) {
            throw $e;
        }

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout()
    {
        try {
            auth()->logout();
        }
        catch (JWTException $e)
        {
            throw $e;
        }
        return response([
            'message' => 'Hai effettuato il logout',
        ]);
    }
}
