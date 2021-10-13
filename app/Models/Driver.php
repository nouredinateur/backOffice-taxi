<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Driver extends Model implements ReviewRateable
{
    use HasFactory, ReviewRateableTrait;

    protected $fillable = [
        'num_permis',
        'num_permis_de_confiance',
        'date_de_permis',
        'date_de_permis_confiance',
        'car_model'
        
    ];

    protected $hidden = [
        'password', 
        'remember_token',
        'user_id',
        'created_at',
        'updated_at'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function boot() 
    {
        parent::boot();
        static::deleted(function($driver) {
           $driver->user()->delete();
        });
    }
}
