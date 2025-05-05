<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counpon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'counpon_name',
        'counpon_code',
        'counpon_qty',
        'counpon_percent',
        'counpon_function',
        'counpon_date_start',
        'counpon_date_end'
    ];
    protected $primaryKey = 'counpon_id';
    protected $table = 'tbl_counpon';
}
