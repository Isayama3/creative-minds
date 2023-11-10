<?php

namespace App\Http\Requests\Api\User;

use App\Rules\PhoneRule;
use App\Traits\SendResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PhoneOtpRequest extends FormRequest
{
    use SendResponse;

    public function authorize()
    {
        if (app()->runningInConsole()) {
            return true;
        }
        return true;
    }

    public function rules()
    {
        return [
            'phone' => ["required", new PhoneRule],
            'otp' => ['nullable', 'numeric']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->ErrorValidate(
            $validator->errors()->toArray(),
        ));
    }
}
