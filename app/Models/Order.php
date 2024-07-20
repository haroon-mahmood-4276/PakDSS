<?php

namespace App\Models;

use App\Utils\Enums\{OrderStatuses, PaymentStatuses};
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'order_number',
        'user_id',
        'shipping_address_id',
        'billing_address_id',
        'order_status',
        'payment_method',
        'payment_status',
    ];

    protected $casts = [
        'order_status' => OrderStatuses::class,
        'payment_status' => PaymentStatuses::class,
    ];

    public $rules = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
