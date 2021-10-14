<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Client extends Model implements ReviewRateable
{
    use HasFactory, ReviewRateableTrait;

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'cin',
        'phoneNumber',
        'password'
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

    public function route()
    {
        return $this->hasMany(Route::class);
    }

    public static function boot() 
    {
        parent::boot();
        static::deleted(function($client) {
           $client->user()->delete();
        });
    }
}
