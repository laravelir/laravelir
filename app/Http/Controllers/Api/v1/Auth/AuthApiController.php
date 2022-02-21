<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Api\v1\BaseApiController;

class AuthApiController extends BaseApiController
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response([
                'message' => 'Invalid'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);

        return response([
            'message' => 'ok'
        ])->withCookie($cookie);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation failed', $validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('MOBILE_APP');
            DB::commit();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return $this->sendError('User registration failed', ['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        if (!is_null($user) && !is_null($token)) {
            event(new Registered($user));
            return $this->sendResponse('User created', ['token' => $token->plainTextToken]);
        }
    }

    public function logout(Request $request)
    {
        $cookie = cookie()->forget('jwt');
        return response([
            'message' => 'ok'
        ]);
    }

    public function current()
    {
        $user = Auth::user();
        return $user;
    }
}
