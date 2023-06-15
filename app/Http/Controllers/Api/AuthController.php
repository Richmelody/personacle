<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function test(Request $request)
    {
        return \response()->json(['test' => \true]);
    }

    public function signup(SignupRequest $request)
    {
        $data = $request->validated();

        /** @var \App\Models\User */
        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('auth')->plainTextToken;

        return \response()->json(\compact('user', 'token'));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $remember = $credentials['remember'];

        $authenticated = Auth::attempt($credentials, \boolval($remember));

        if (!$authenticated) {
            return response()->json([
                'message' => 'Unable to authenticate user'
            ]);
        }

        /** @var \App\Models\User */
        $user = Auth::user();

        $token = $user->createToken('auth')->plainTextToken;

        return \response()->json(\compact('user', 'token'));
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\User */
        $user = $request->user();

        /** @var \Laravel\Sanctum\PersonalAccessToken */
        $token =  $user->currentAccessToken();

        $token->delete();

        return \response('', 204);
    }
}
