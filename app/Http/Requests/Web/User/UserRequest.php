<?php

namespace App\Http\Requests\Web\User;

class UserRequest extends UserBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (app('request')?->route()?->getName() == 'user.firebase.msg') {
            return [
                'message' =>  'required|string',
            ];
        }

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'username' => 'required|string|max:255',
                        'email' => 'required|email|unique:users',
                        'phone' => 'required|string|min:10|max:15',
                        'password' => 'required|string|min:8',
                    ];
                }
            case 'PUT': {
                    return [
                        'username' => 'required|string|max:255',
                        'email' => 'required|email|unique:users,email,' . $this->user,
                        'phone' => 'required|string|min:10|max:15',
                        'password' => 'required|string|min:8',
                    ];
                }
        }
    }
}
