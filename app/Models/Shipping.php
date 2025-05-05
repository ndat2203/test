<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'customer_id',
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'shipping_note',
        'shipping_matp',
        'shipping_maqh',
        'shipping_xaid',
        'created_at',
        'updated_at'



    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
