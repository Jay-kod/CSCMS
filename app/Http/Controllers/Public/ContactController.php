<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request) {
        // Validation format necessary for Vue Axios interceptors to spawn SweetAlert error dialogs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Success format necessary for Vue Axios interceptors to spawn generic global SweetAlert success dialogs
        return response()->json([
            'message' => 'Your message has been sent successfully. We will get back to you soon.'
        ], 200);
    }
}
