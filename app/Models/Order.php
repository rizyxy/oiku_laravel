<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'status',
        'total'
    ];
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->status = 'Waiting';
        });
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
