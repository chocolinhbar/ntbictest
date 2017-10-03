<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function changeLanguage(Request $request) {
        session(['language' => $request->locale]);
        return response()->json();
    }
}
