<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Auth
 *
 * APIs for authentication
 */
class AuthController extends Controller
{

    /**
     * Login
     * 
     * Login to the application
     * 
     * @bodyParam name string required The name of the user. Example: merchant
     * @bodyParam email string required The email of the user. Example: merchant@mail.com
     * @bodyParam password string required The password of the user. Example: password
     * */
    public function login(AuthLoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->where('name', $validated['name'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw new HttpResponseException(
                response()->json([
                    'status' => '401 Unauthorized',
                    'message' => 'User not found',
                    'errors' => [
                        'message' => 'Incorrect name, email or password',
                    ]
                ], 401));
        }

        $token = $user->createToken('user-token')->plainTextToken;

        return response()->json([
            'status' => '200 OK',
            'message' => 'Login successful',
            'data' => new UserResource($user),
            'token' => $token,
        ], 200);
    }

    /**
     * Logout
     * 
     * Logout from the application
     * 
     * @authenticated
     * 
     * @response 200 {
     * "message": "Logged out"
     * }
     * */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => '200 OK',
            'message' => 'Logged out'
        ], 200);
    }
}
