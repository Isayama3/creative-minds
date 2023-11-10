<?php

namespace App\Http\Requests\Api\User;

use App\Traits\SendResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserBaseRequest extends FormRequest
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
        return Auth::guard('user-api')->check();
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->ErrorValidate(
            $validator->errors()->toArray(),
        ));
    }
}
