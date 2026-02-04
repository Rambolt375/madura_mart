<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'id_purchase',
        'id_product',
        'purchase_price',
        'selling_margin',
        'subtotal',
        'total_pay'
    ];
}
