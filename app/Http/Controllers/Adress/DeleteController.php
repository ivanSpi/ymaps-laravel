<?php

namespace App\Http\Controllers\Adress;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdressResource;
use App\Models\Adress;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Adress $adress)
    {

        $adress->delete();

        return response([]);
    }
}
