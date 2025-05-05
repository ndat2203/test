<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'brand_name',
        'brand_slug',
        'brand_desc',
        'brand_status',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'brand_id');
    }
}
