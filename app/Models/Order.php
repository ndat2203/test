<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'customer_id',
        'shipping_id',
        'payment_id',
        'order_total',
        'order_status',
        'created_at',
        'updated_at',
        'order_date',
        'order_code'



    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'customer_id');
    }
    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

}
