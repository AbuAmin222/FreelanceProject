<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\AuthHelperController;
use App\Models\Admin;
use App\Models\Freelancer;
use App\Models\User;
use App\Notifications\forgetPasswordNotification;
use App\Notifications\verifyEmailNotification;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class AuthController extends Controller
{
    // Login Functions
    function index(Request $request)
    {
        return view('Auth.Login.section');
    }
    function login(Request $request)
    {
        $validationResult = AuthHelperController::validateLoginData($request->all());
        if (!$validationResult) {
            // إذا كان هناك أخطاء، ارجعها أو تعامل معها حسب حاجتك
            return redirect()->back()->withErrors($validationResult)->withInput();
        }

        $data = $request->only(['email', 'password']);

        $modelClass = AuthHelperController::findData('email', $request->email);
        if (!$modelClass) {
            return redirect()->back()->withErrors(['email' => "Canno`t found this email({$data['email']})"])->withInput();
        }

        $user = $modelClass::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => "Canno`t found data for this email({$data['email']})"])->withInput();
        }

        if (empty($user->email_verified_at)) {
            return back()->withErrors(['email' => 'Email is not verified']);
        }
        $guard = AuthHelperController::getGuardFromModel($modelClass);

        if (!Auth::guard($guard)->attempt($data, $request->filled('remember'))) {
            return redirect()->back()->withErrors('Invalid Credentials')->withInput();
        }
        $cryptedData = Crypt::encrypt([
            'modelName' => $modelClass,
            'user_id' => $user->id,
        ]);
        session(['cryptedData' => $cryptedData]);
        return redirect()->route("{$guard}.lightDash");
    }
    // end-functions

    // Dashboard Functions
    function lightDash(Request $request)
    {
        $guard = $request->route('guard');
        $cryptedData = session('cryptedData');
        session(['cryptedData' => $cryptedData]);
        return view('Dashboard.Content.LightDash.contentLightDash', compact('guard', 'cryptedData'));
    }
    function darkDash(Request $request)
    {
        $guard = $request->route('guard');
        $cryptedData = session('cryptedData');
        session(['cryptedData' => $cryptedData]);
        return view('Dashboard.Content.DarkDash.contentDarkDash', compact('guard', 'cryptedData'));
    }
    // end-functions

    // Register Functions
    function indexregister(Request $request)
    {
        $guard = $request->route('guard');
        return view('Auth.register', compact('guard'));
    }
    function register(Request $request)
    {
        $validation = AuthHelperController::validateRegisterData($request->all());
        if (!$validation) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $guard = $request->account_type;
        $modelClass = AuthHelperController::getModelName($guard);

        $token = Str::random(64);

        $specializations = null;
        if ($request->has('webDeveloper')) {
            $specializations .= 'webDeveloper,';
        }
        if ($request->has('phoneApplications')) {
            $specializations .= 'phoneApplications,';
        }
        if ($request->has('graphicDesign')) {
            $specializations .= 'graphicDesign,';
        }
        if ($request->has('writingContent')) {
            $specializations .= 'writingContent,';
        }
        if ($request->has('degitalMarkiting')) {
            $specializations .= 'degitalMarkiting,';
        }
        if ($request->has('translate')) {
            $specializations .= 'translate,';
        }
        if ($request->has('videoEditor')) {
            $specializations .= 'videoEditor,';
        }
        if ($request->has('searchEngine')) {
            $specializations .= 'searchEngine,';
        }

        $identityName = null;
        if ($request->hasFile('identity')) {
            $image = $request->file('identity');
            $identityName = 'Identity' . '_' . time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/identityImages'), $identityName);
        }
        $identityPersonName = null;
        if ($request->hasFile('identityPerson')) {
            $PersonImage = $request->file('identityPerson');
            $identityPersonName = 'Identity-Person' . '_' . time() . '_' . uniqid() . '_' . $PersonImage->getClientOriginalName();
            $PersonImage->move(public_path('uploads/identityImages'), $identityPersonName);
        }
        $user = $modelClass::create([
            'fullname' => $request->fullName,
            'email' => $request->email,
            'specializations' => $specializations,
            'identity' => $identityName,
            'identity_person' => $identityPersonName,
            'bio' => $request->bio,
            'experience' => $request->experience,

            'password' => Hash::make($request->password),

            'verification_token' => $token,
            'verification_token_sent_at' => now(),
        ]);

        // Encrypt all data for security
        $encryptedData = Crypt::encrypt([
            'user_id' => $user->id,
            'email' => $request->email,
            'token' => $token,
        ]);
        $email = $request->email;

        return redirect()->route($guard . '.emailNotification', compact('encryptedData'));
    }
    // end-functions

    // Email Verification Functions
    function emailNotification(Request $request)
    {
        $guard = $request->route('guard');
        $decryptedData = Crypt::decrypt($request->encryptedData);

        $token = $decryptedData['token'];
        $encryptedData = $request->encryptedData;
        $email = $decryptedData['email'];

        FacadesNotification::route('mail', $email)->notify(new verifyEmailNotification($guard, $token));
        cache()->put("pending_registration_{$token}", $encryptedData, now()->addMinutes(120));

        return redirect()->route($guard . '.emailVerified', compact('encryptedData'));
    }
    function emailVerified(Request $request)
    {
        $guard = $request->route('guard');
        $decryptedData = Crypt::decrypt($request->encryptedData);

        $email = $decryptedData['email'];
        $encryptedData = $request->encryptedData;
        $token = $decryptedData['token'];

        return view('Auth.verifiedMail', compact('guard', 'email', 'encryptedData'));
    }
    function emailVerifiedS(Request $request)
    {
        $guard = $request->route('guard');
        return view('Auth.confirmEmail', compact('guard'));
    }
    // end-functions

    // Password Forget Functions
    function indexForgetPass(Request $request)
    {
        $guard = $request->route('guard');
        return view('Auth.Login.PasswordActions.Forget_Password.section', compact('guard'));
    }
    function forgetPass(Request $request)
    {
        // $guard = $request->route('guard');

        // $user = User::where('email', $request->email)->first();
        $modelClass = AuthHelperController::findData('email', $request->email);
        if (! $modelClass) {
            return redirect()->back()->withErrors(['email' => 'This mail isn`t register!!! Please register first'])->withInput();
        }

        $user = $modelClass::where('email', $request->email)->first();
        if (! $user) {
            return redirect()->back()->withErrors(['email' => 'Canno`t find data'])->withInput();
        }
        // if ($user->account_type !== $guard) {
        //     return redirect()->back()->withErrors(['email' => "In-correct mail, youre {$guard}"])->withInput();
        // }
        if (!$user->email_verified_at) {
            return redirect()->back()->withErrors(['email' => "Please verify email first"])->withInput();
        }
        $guard = AuthHelperController::getGuardFromModel($modelClass);

        $encryptedData = Crypt::encrypt([
            'modelName' => $modelClass,
            'guard' => $guard,
            'user_id' => $user->id,
        ]);
        session(['encryptedData' => $encryptedData]);

        return redirect()->route($guard . '.forgetPass.reSend');
    }
    function sendPassLink(Request $request)
    {
        $data = session('encryptedData');
        if (!$data) {
            return redirect()->back()->withErrors(['data' => 'Can`t found data!!!']);
        }
        try {
            $decryptedData = Crypt::decrypt($data);
        } catch (DecryptException $e) {
            return redirect()->back()->withErrors(['data' => 'Can`t extract data!!!'])->withInput();
        }

        $user = $decryptedData['modelName']::FindOrFail($decryptedData['user_id']);
        if (! $user) {
            return redirect()->back()->withErrors(['email' => 'This mail isn`t register!!! Please register first'])->withInput();
        }

        $token = Str::random(64);
        $hashedToken = hash('sha256', $token);

        $user->update([
            'verification_token' => $hashedToken,
            'verification_token_sent_at' => now(),
        ]);

        $guard = $decryptedData['guard'];
        $user->notify(new forgetPasswordNotification($guard, $token));

        return redirect()->route($guard . '.confirm');
    }
    function confirm(Request $request)
    {
        $data = session('encryptedData');

        try {
            $decryptedData = Crypt::decrypt($data);
        } catch (DecryptException $e) {
            return redirect()->back()->withErrors(['data' => 'Can`t extract data!!!'])->withInput();
        }

        $user = $decryptedData['modelName']::FindOrFail($decryptedData['user_id']);
        if (! $user) {
            abort(404, 'User not found');
        }

        $guard = $decryptedData['guard'];
        $email = $user->email;
        return view('Auth.Login.PasswordActions.Notification.section', compact('guard', 'email'));
    }
    function resetPass(Request $request)
    {
        $validate = AuthHelperController::validatePasswordPattern($request->password);
        if (!$validate) {
            return redirect()->back()->withErrors(['password' => 'Password must be at least 8 characters
            long and contain at least one uppercase letter, one lowercase letter, one number and one special
            character.'])->withInput();
        }
        $guard = $request->route('guard');
        $modelName = AuthHelperController::getModelFromGuard($guard);

        $user = $modelName::findOrFail($request->id);
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'This mail isn`t register!!! Please register
        first...'])->withInput();
        }
        $user->update([
            'password' => Hash::make($request->password),
            'verification_token' => null,
            'verification_token_sent_at' => null,
        ]);

        return redirect()->route($guard . '.lightDash');
    }
    protected function getPasswordBroker($guard)
    {
        return match ($guard) {
            'admin' => 'admins',
            'freelancer' => 'freelancers',
            default => 'clients',
        };
    }

    // Logout Function
    function logout(Request $request)
    {
        $guard = $request->route('guard');

        Auth::guard($guard)->logout();
        $request->session()->invalidate();     // إلغاء الجلسة (السيشن)
        $request->session()->regenerateToken(); // إعادة إنشاء CSRF token

        return redirect()->route('login');
    }
    // end-functions
}
