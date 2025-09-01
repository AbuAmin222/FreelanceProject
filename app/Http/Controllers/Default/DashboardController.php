<?php

namespace App\Http\Controllers\Default;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\AuthHelperController;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    function confirmPass(Request $request)
    {
        $guard = $request->route('guard');
        return view('Dashboard.Content.LightDash.contentValidatePass', compact('guard'));
    }
    function validateData(Request $request)
    {
        $guard = $request->route('guard');
        $enecryptData = session('cryptedData');
        try {
            $decrypted = Crypt::decrypt($enecryptData);
        } catch (DecryptException $e) {
            return redirect()->back()->withErrors('Falid extract data')->withInput();
        }
        $user = $decrypted['modelName']::findOrFail($decrypted['user_id']);
        $data = $request->only(['email', 'password']);
        if (!Auth::guard($guard)->attempt($data, $request->filled('remember'))) {
            return redirect()->back()->withErrors('Invalid Credentials')->withInput();
        }
        $user_id = $user->id;
        return redirect()->route($guard . '.resetPass', compact('user_id'));
    }
    function resetPass(Request $request)
    {
        $guard = $request->route('guard');
        $user_id = $request->user_id;
        return view('Dashboard.Content.LightDash.contentResetPassword', compact('guard', 'user_id'));
    }
    function submitRPass(Request $request){
        $validate = AuthHelperController::validatePasswordPattern($request->password);
        if(!$validate){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $guard = $request->route('guard');
        $modelName = AuthHelperController::getModelFromGuard($guard);
        $user = $modelName::FindOrFail($request->id);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Password reset successfully!');
    }
    function profile(Request $request){
        dd($request->all());
    }
}
