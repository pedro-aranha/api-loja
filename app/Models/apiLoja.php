<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiLoja extends Model
{
    use HasFactory;

    protected $primaryKey = "sales_id";
    protected $fillable = [
        'sales_id',
        'amount',
        'products',
        'products_id',
        'nome',
        'price'
    ];
}
