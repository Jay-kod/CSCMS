<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function forgotPassword() {
        return response()->json([]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid email or password.'], 401);
        }

        if (!$user->is_active) {
            return response()->json(['message' => 'Your account is inactive.'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->map(function($role) { return ['name' => $role->name]; }),
                'permissions' => $user->getPermissionsViaRoles()->map(function($perm) { return ['name' => $perm->name]; })
            ]
        ]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me(Request $request) {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles->map(function($role) { return ['name' => $role->name]; }),
            'permissions' => $user->getPermissionsViaRoles()->map(function($perm) { return ['name' => $perm->name]; })
        ]);
    }

    public function resetPassword() {
        return response()->json([]);
    }
}
