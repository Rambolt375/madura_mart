<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'no_invoice',
        'purchase_date',
        'id_distributor',
        'purchase_amount'
    ];
}
