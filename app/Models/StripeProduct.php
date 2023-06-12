<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StripeProduct
 *
 * @property int $id
 * @property string $product_id
 * @property string $object
 * @property int $active
 * @property float $default_price
 * @property string $price_id
 * @property string $interval
 * @property string|null $description
 * @property string|null $metadata
 * @property string|null $name
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereDefaultPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereObject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct wherePriceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeProduct whereUrl($value)
 * @mixin \Eloquent
 */
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
