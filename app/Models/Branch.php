<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class);
    }

    //Inverse of hasmany
    // public function belongsToMany(){
    //     return $this->belongsTo(Student::class);
    // }
}
