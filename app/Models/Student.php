<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    public function getLnameAttribute($value){
        return strtolower($value);
    }

    public function setMobileAttribute($value){
        $this->attributes['mobile'] = '+91'.$value;
    }

    public function branch(){
        return $this->hasOne(Branch::class)->select('course_name');
    }
}
