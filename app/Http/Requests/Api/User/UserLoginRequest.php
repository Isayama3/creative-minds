<?php

namespace App\Http\Requests\Api\User;

use App\Rules\PasswordRule;
use App\Traits\SendResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLoginRequest extends FormRequest
{
    use SendResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'email' => 'required|email|exists:users,email',
            'password' => ["required", new PasswordRule],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function () {
            if (!auth()->guard('user-api')->attempt(['email' => $this->email, 'password' => $this->password]))
                throw new HttpResponseException($this->ErrorMessage('بيانات الدخول غير صحيحة'));
        });
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->ErrorValidate(
            $validator->errors()->toArray(),
        ));
    }
}
