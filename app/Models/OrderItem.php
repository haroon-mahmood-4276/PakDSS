<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
        'attributes',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'float',
        'total_price' => 'float',
        'attributes' => 'object',
        
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
