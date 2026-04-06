<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function forgotPassword() {
        return response()->json([]);
    }
    public function login() {
        return response()->json([]);
    }
    public function logout() {
        return response()->json([]);
    }
    public function me() {
        return response()->json([]);
    }
    public function resetPassword() {
        return response()->json([]);
    }
}
