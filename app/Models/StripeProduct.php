<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'object',
        'active',
        'default_price',
        'price_id',
        'interval',
        'description',
        'metadata',
        'name',
        'url',
    ];
}
