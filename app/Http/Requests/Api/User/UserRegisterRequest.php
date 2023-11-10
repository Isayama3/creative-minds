<?php

namespace App\Http\Requests\Api\User;

use App\Enums\UserType;
use App\Rules\PasswordRule;
use App\Rules\PhoneRule;
use App\Traits\SendResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
{
    use SendResponse;



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if (app()->runningInConsole()) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users,username',
            'password' => ["required", new PasswordRule],
            'email' => 'email|required|unique:users,email',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'device_key' => 'required',
            'user_type' => 'required|in:' . implode(',', UserType::casesValues()),
            'phone' => [
                "required",
                new PhoneRule,
                "unique:users,phone",
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->ErrorValidate(
            $validator->errors()->toArray(),
        ));
    }
}
