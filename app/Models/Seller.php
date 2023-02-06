<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'seller_name',
        'created_at',
        'updated_at'
    ];
}
