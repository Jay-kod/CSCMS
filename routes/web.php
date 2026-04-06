<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function (\Illuminate\Http\Request $request) {
    if ($request->is('api/*') || $request->wantsJson()) {
        // Return a proper JSON 404 response for API requests
        return response()->json(['message' => 'Not Found.'], 404);
    }
    
    return view('welcome');
});
