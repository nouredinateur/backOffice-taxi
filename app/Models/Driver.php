<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Driver extends Model implements ReviewRateable
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
}
