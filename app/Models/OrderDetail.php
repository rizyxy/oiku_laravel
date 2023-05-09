<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];

    public function parentOrder() {
        $this->belongsTo(Order::class);
    }

    public function product() {
        $this->hasOne(Product::class);
    }
}
