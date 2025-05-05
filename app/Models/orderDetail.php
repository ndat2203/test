<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_sales_quantity',
        'created_at',
        'updated_at',
        'product_counpon_percent'



    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'tbl_order_detail';
}
