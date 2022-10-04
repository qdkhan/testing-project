<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public function houseAddress(){
        return $this->hasOneThrough(Home::class, Broker::class);
    }

    public function houseList(){
        return $this->hasManyThrough(Home::class, Broker::class);
    }
}
