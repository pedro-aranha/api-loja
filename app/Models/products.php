<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'description'
    ];
}
