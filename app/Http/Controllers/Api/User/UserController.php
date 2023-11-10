<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User as Model;
use App\Http\Resources\User\UserResource as Resource;
use App\Http\Requests\Api\User\UserRequest as FormRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(FormRequest $request, Model $model, $resource = Resource::class)
    {
        parent::__construct(
            $request,
            $model,
            $resource,
            hasDelete: true,
        );
    }

    public function getNearestDeliveries()
    {
        $latitude = $this->request->latitude;
        $longitude = $this->request->longitude;

        // $radius = 200;

        $nearestDeliveries = Model::select('id', 'username', 'latitude', 'longitude', 'user_type')
            ->selectRaw(
                '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
                [$latitude, $longitude, $latitude]
            )
            ->where('user_type', 'delivery')
            // ->having('distance', '<', $radius)
            ->orderBy('distance', 'asc')
            ->first();


        return $this->easyResponse(['nearest_deliveries' => $nearestDeliveries]);
    }
}
