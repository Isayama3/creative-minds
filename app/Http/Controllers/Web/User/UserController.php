<?php

namespace App\Http\Controllers\Web\User;

use App\Models\User as Model;
use App\Http\Requests\Web\User\UserRequest as FormRequest;
use Exception;
use Helper\FirebaseHelper;

class UserController extends Controller
{
    /**
     * Init.
     * @param FormRequest $request
     * @param Model       $model
     * @param string      $resource
     */
    public function __construct(FormRequest $request, Model $model)
    {
        parent::__construct(
            $request,
            $model,
            hasDelete: true,
        );
    }



    public function indexColumns(): array
    {
        return [
            'id' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'text'
            ],
            'username' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'text'
            ],
            'email' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'email'
            ],
            'phone' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'number'
            ],
            'latitude' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'number'
            ],
            'longitude' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'number'
            ],
            'user_type' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'string'
            ],
        ];
    }

    public function createFields(): array
    {
        return [
            'username' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'text'
            ],
            'email' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'email'
            ],
            'phone' => [
                'validation'   => 'required',
                'type'         => 'string',
                'input-type'   => 'number'
            ],
            'password' => [
                'validation'   => 'required',
                'type'         => 'string',
                'options'      => [],
                'input-type'   => 'password'
            ],
        ];
    }

    public function sendFirebaseMsg($device_key)
    {
        try {
            FirebaseHelper::PushNotification([$device_key], ['body' => request()->message]);
            return redirect()->route('user.users.index')->with('success', 'Message successfully!');
        } catch (Exception $e) {
            return redirect()->route('user.users.index')->with('error', 'Something went wrong!');
        }
    }
}
