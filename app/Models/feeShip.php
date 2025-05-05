<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeShip extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'fee_maqh',
        'fee_matp',
        'fee_xaid',
        'fee_ship',
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_fee_ship';
    // lien ket bang
    public function city() {
        return $this->belongsTo('App\Models\City', 'fee_matp');
    }

    public function province() {
        return $this->belongsTo('App\Models\Province', 'fee_maqh');
    }

    public function ward() {
        return $this->belongsTo('App\Models\Ward', 'fee_xaid');
    }

}
