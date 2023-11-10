<?php

namespace App\Services;

use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Config;

class TwilioService
{
    public static function sendVerificationSMS($phone_number, $otp)
    {
        try {
            $twilio = new Client(
                Config::get('services.twilio.account_sid'),
                Config::get('services.twilio.auth_token')
            );

            $twilio->messages->create(
                $phone_number,
                [
                    'from' => Config::get('services.twilio.phone_number'),
                    'body' => "Your verification code is: $otp",
                ]
            );

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
