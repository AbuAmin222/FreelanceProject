<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\AuthHelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class EmailVerificationController extends Controller
{
    function verify(Request $request, $guard, $token)
    {
        $modelClass = AuthHelperController::getModelName($guard);

        // $encryptedData = cache()->pull("pending_registration_{$token}");
        $encryptedData = cache()->get("pending_registration_{$token}");

        if (!$encryptedData) {
            abort(404, 'Invalid or expired verification link.');
        }

        $data = Crypt::decrypt($encryptedData);

        $user = $modelClass::FindOrFail($data['user_id']);

        $user->update([
            'email_verified_at' => now(),

            'verification_token' => null,
            'verification_token_sent_at' => null,
        ]);

        return redirect()->route($guard . '.emailVerifiedS');
    }
}
