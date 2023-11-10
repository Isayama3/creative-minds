<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserLoginRequest;
use App\Models\User;
use App\Http\Requests\Api\User\UserRegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Traits\SendResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use SendResponse;

    public function login(UserLoginRequest $request)
    {
        $user = auth()->guard('user-api')->user();

        if ($user->phone_status == null)
            return $this->ErrorMessage('الرجاء تفعيل رقم الهاتف اولا');

        return $this->shortSuccess(
            [
                'token' => JWTAuth::fromUser($user),
                'user' => UserResource::make($user),
            ],
            'تم تسجيل الدخول بنجاح',
        );
    }

    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->validated());

        if ($user)
            return $this->SuccessMessage('تم التسجيل بنجاح برجاء تفعيل رقم الهاتف للمتابعه');

        return $this->ErrorMessage('خطا غير معروف');
    }
}
