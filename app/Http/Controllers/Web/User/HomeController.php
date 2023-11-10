<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Requests\BaseRequest;
use App\Models\User as Model;

class HomeController extends Controller
{
    public function __construct(BaseRequest $request, Model $model)
    {
        parent::__construct(
            $request,
            $model,
        );
    }
}
