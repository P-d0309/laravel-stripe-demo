<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'stripe_id',
        'object',
        'active',
        'default_price',
        'stripe_id',
        'description',
        'metadata',
        'name',
        'url',
    ];
}
