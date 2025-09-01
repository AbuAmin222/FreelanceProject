<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\AuthHelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function indexReset(Request $request)
    {
        $guard = $request->route('guard');
        $token = $request->query('token');
        $id = $request->query('id');
        return view('Auth.Login.PasswordActions.Reset.section', compact('guard', 'token', 'id'));
    }
}
