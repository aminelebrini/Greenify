<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    public function products()
{
    return $this->belongsToMany(Product::class, 'order_items')
                ->withPivot('quantity', 'price');
}
}
