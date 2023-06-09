<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consignor',
        'product_image',
        'product_name',
        'product_desc',
        'product_price',
        'product_avail'
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function consignor() {
        return $this->belongsTo(auth()->user()->id, 'id_consignor');
    }

}
