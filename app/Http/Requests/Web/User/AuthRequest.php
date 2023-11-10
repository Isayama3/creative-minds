<?php

namespace App\Http\Requests\Web\User;

use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        if (app()->runningInConsole()) {
            return true;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (app()->runningInConsole())
            return [];

        if (app('request')?->route()?->getName() == 'login.form')
            return [];

        if (app('request')?->route()?->getName() == 'change-password')
            return [
                'password' => ["required", new PasswordRule],
            ];

        if (app('request')?->route()?->getName() == 'login.post')
            return [
                'email' => 'required|email|exists:users,email',
                'password' => ["required", new PasswordRule],
            ];

        return [];
    }

    public function failedValidation(Validator $validator)
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
    }
}
