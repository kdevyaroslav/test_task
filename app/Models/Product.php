<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'phone_name',
        'seller_id',
        'display_size',
        'quantity',
        'cost',
        'created_at',
        'updated_at'
    ];
}
