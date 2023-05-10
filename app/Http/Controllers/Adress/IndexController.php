<?php

namespace App\Http\Controllers\Adress;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdressResource;
use App\Models\Adress;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {


        $adresses = Adress::all();


        return AdressResource::collection($adresses);
    }
}
