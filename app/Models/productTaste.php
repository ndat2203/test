<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productTaste extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'product_id',
        'taste_id',

    ];
    protected $primaryKey = 'product_taste_id';
    protected $table = 'tbl_product_taste';
}
