<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broker;
use App\Models\Home;
use App\Models\People;

class HasOneController extends Controller
{
    public function hasOneThrough(){
        // $result = People::find(1)->houseAddress;
        $result = People::find(2)->houseList;
        return $result;
    }
}
