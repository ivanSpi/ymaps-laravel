<?php

namespace App\Http\Controllers\Adress;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adress\StoreRequest;
use App\Http\Resources\AdressResource;
use App\Models\Adress;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {

        $data = $storeRequest->validated();

        $data = ['name' => $data['name'],'description' => $data['description'], 'point' => $data['point']];

        Adress::create($data);

        return response([]);
    }
}
