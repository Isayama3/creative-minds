<?php

namespace App\Http\Requests\Web\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserBaseRequest extends FormRequest
{
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

    public function failedValidation(Validator $validator)
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
    }
}
