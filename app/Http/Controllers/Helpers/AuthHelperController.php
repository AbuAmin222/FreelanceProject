<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ModelLoginSearchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthHelperController extends Controller
{
    public static function getModelName($guard)
    {
        $provider = data_get(config('auth'), "guards.$guard.provider");
        $modelClass = data_get(config('auth'), "providers.$provider.model");
        return $modelClass;
    }
    public static function checkCredentialsByGuard($guard, $email, $password)
    {
        // $provider = config("auth.guards.$guard.provider");
        // $modelClass = config("auth.providers.$provider.model");
        // $provider = data_get(config('auth'), "guards.$guard.provider");
        // $modelClass = data_get(config('auth'), "providers.$provider.model");
        $modelClass = data_get(config('auth'), "providers." . data_get(config('auth'), "guards.$guard.provider") . ".model");

        $user = $modelClass::where('email', $email)->first();

        return $user && Hash::check($password, $user->password);
    }
    public static function validateLoginData($data)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'password.required' => 'Password is required',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return true;
    }
    public static function validateRegisterData($data)
    {

        $rules = [
            'fullName' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'same:password'],
            'identity' => ['required'],
            'identityPerson' => ['required'],
            'account_type' => ['required'],
        ];

        $messages = [
            'account_type.required' => 'Account type is required',
            'fullName.required' => 'Full name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'password.required' => 'Password is required',
            'confirmPassword.required' => 'Confirm password is required',
            'confirmPassword.same' => 'Passwords do not match',
            'identity.required' => 'Identity is required',
            'identityPerson.required' => 'Identity person is required',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return true;
    }
    public static function validatePasswordPattern($password)
    {
        // (?=.*[a-z]) → يجب أن يحتوي على حرف صغير واحد على الأقل

        // (?=.*[A-Z]) → يجب أن يحتوي على حرف كبير واحد على الأقل

        // (?=.*\d) → يجب أن يحتوي على رقم واحد على الأقل

        // (?=.*[@$!%*?&]) → يجب أن يحتوي على رمز خاص واحد على الأقل من المجموعة

        // [A-Za-z\d@$!%*?&]{8,} → الحد الأدنى 8 أحرف، مكونة من الأحرف الكبيرة والصغيرة، الأرقام، والرموز الخاصة المحددة


        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if (preg_match($pattern, $password)) {
            return true;
        }
        return false;
    }
    public static function webGuard($guard)
    {
        if ($guard === 'client') {
            $guard = 'web';
        }
    }
    public static function findData($column, $value)
    {
        $modelPath = app_path('Models');
        $files = File::files($modelPath);

        foreach ($files as $file) {
            $modelName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $modelClass = "App\Models\\{$modelName}";

            if (class_exists($modelClass)) {
                if (in_array(ModelLoginSearchable::class, class_uses($modelClass))) {
                    $record = $modelClass::where($column, $value)->first();
                    if ($record) {
                        return $modelClass;
                    }
                }
            }
        }
        return null;
    }
    public static function getGuardFromModel($model)
    {
        // إذا تم تمرير كائن، خذ اسم الكلاس
        $modelClass = is_object($model) ? get_class($model) : $model;

        $modelPath = app_path('Models');
        $files = File::files($modelPath);

        foreach ($files as $file) {
            $modelName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $modelClassInFile  = "App\Models\\{$modelName}";

            // تحقق أن الموديل يطابق الموديل الذي أعطيته
            if (class_exists($modelClassInFile) && $modelClassInFile === $modelClass) {
                $guard = lcfirst($modelName); // اجعل الحرف الأول صغير
                if ($modelName === 'User') {
                    $guard = 'web'; // استثناء للموديل User
                }
                return $guard;
            }
        }

        return null;
    }
    public static function getModelFromGuard($guard)
    {
        if ($guard === 'web') {
            return User::class;
        }

        $modelPath = app_path('Models');
        $files = File::files($modelPath);

        foreach ($files as $file) {
            $modelName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $modelClassInFile = "App\\Models\\{$modelName}";

            if (class_exists($modelClassInFile)) {
                if (lcfirst($modelName) === $guard) {
                    return $modelClassInFile;
                }
            }
        }

        return null;
    }
}
