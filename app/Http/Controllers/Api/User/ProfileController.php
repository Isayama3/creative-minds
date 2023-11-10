<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Resources\User\UserResource;
use App\Traits\SendResponse;
use Illuminate\Http\Request;

class ProfileController
{
    use SendResponse;

    public function getProfile()
    {
        return $this->ShortSuccess(new UserResource(auth()->guard('user-api')->user()));
    }

    public function logout(Request $request)
    {
        auth()->guard('user-api')->logout();

        return $this->SuccessMessage('تم تسجيل الخروج بنجاح');
    }
}
