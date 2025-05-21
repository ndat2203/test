<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'payment_method',
        'payment_status',
        'created_at',
        'updated_at',
        'order_id'

    ];
    protected $primaryKey = 'payment_id';
    protected $table = 'tbl_payment';
    public function orders() {
        return $this->hasMany(Order::class, 'payment_id');
    }
}
