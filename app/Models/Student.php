<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['fname', 'lname', 'mobile'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function getLnameAttribute($value){
        return strtolower($value);
    }

    public function setMobileAttribute($value){
        $this->attributes['mobile'] = '+91'.$value;
    }

    public function branch(){
        return $this->hasOne(Branch::class);
    }

    public function branches(){
        return $this->hasMany(Branch::class);
    }

    /* public static function boot(){

        parent::boot();

        static::creating(function($item){
            Log::info("Creating Student ".$item);
        });
        static::created(function($item){
            Log::info("Created Student ".$item);
        });

        static::updating(function($item){
            Log::info("Updating Student ".$item);
        });
        static::updated(function($item){
            Log::info("Updated Student ".$item);
        });

        static::deleting(function($item){
            Log::info(" Deleting Student ".$item);
        });
        static::deleted(function($item){
            Log::info("Deleted Student ".$item);
        });

    } */

    //OR

    //Use Only Event
    // protected $dispatchesEvents = [
    //     'creating' => \App\Events\StudentCreatingEvent::class,
    //     'created' => \App\Events\StudentCreatedEvent::class,
    // ];

    public function scopeWhereLname($query, $args = 'Khan'){
        return $query->whereNot('lname', $args);
    }
}
