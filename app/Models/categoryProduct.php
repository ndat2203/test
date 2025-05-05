<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'category_name',
        'category_slug',
        'category_parent',
        'category_desc',
        'category_status',
        'category_order',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';
    public function product(){
        return $this->hasMany(Product::class, 'category_id');
    }

}
