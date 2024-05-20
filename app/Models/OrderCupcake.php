<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCupcake extends Model
{
    protected $table = 'order_cupcake';

    protected $fillable = ['order_id', 'cupcake_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function cupcake()
    {
        return $this->belongsTo(CupCake::class);
    }
}
