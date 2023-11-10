<?php

namespace App\Http\Controllers\Api\User;

use App\Traits\SendResponse;
use App\Models\User;
use App\Http\Requests\Api\User\PhoneOtpRequest;
use App\Services\TwilioService;
use Illuminate\Http\Exceptions\HttpResponseException;


class PhoneOtp
{
    use SendResponse;

    public function sendPhoneOtp(PhoneOtpRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();

        if (!$user->phone_status) {
            $otp = rand(111111, 999999);

            // commented cause i dont have the credentials
            // if (!TwilioService::sendVerificationSMS($request->phone, $otp)) {
            //     return $this->ErrorMessage('خطأ غير متوقع جاري المعالجة');
            // };

            $user->vcode_phone = $otp;
            $user->save();

            return $this->SuccessMessage('تم ارسال الرمز الى الهاتف ');
        } else {
            return $this->SuccessMessage('تم تاكيد الهاتف من قبل');
        }
    }

    public function verifyPhoneOtp(PhoneOtpRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();

        if ($user->vcode_phone == $request->otp) {
            $user->phone_status = now();
            $user->vcode_phone = null;
            $user->save();

            return $this->SuccessMessage('تم تاكيد الهاتف');
        } else {
            return $this->ErrorMessage('خطا otp موجود');
        }
    }
}
