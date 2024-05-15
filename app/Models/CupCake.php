<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupCake extends Model
{
    protected $table = 'cupcakes';
    use HasFactory;
    protected $fillable = ['id', 'image', 'name', 'price', 'quantity', 'is_available', 'is_advertised'];
}

