<?php

namespace App\Http\Requests\Api\User;

use App\Rules\PasswordRule;

class UserRequest extends UserBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->route()?->getName() == 'user.get.nearest.deliveries') {
            return [
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
            ];
        }

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'nullable',
                        'email' => 'required|email|unique:users|unique:marketers|unique:suppliers',
                        'password' => ["required", new PasswordRule],
                        'phone' => 'string|nullable',
                    ];
                }
            case 'PUT': {
                    return [
                        'name' => 'nullable',
                        'email' => 'nullable|email|unique:marketers|unique:suppliers|unique:users,email,' . $this->id,
                        'password' => ["nullable", new PasswordRule],
                        'phone' => 'string|nullable',
                    ];
                }
        }
    }
}
