<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'category_id',
        'brand_id',
        'product_name',
        'product_slug',
        'product_desc',
        'product_content',
        'product_price',
        'product_discount_price',
        'product_image',
        'product_status',
        'product_qty',
        'product_sold',
        'product_view',
        'created_at',
        'updated_at'

    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    public function gallery() {
        return $this->hasMany(Gallery::class, 'product_id');
    }

    public function brand() {
        return $this->belongsTo(brandProduct::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(categoryProduct::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_product_id');
    }
    public function taste()
{
    return $this->belongsToMany(Taste::class, 'tbl_product_taste', 'product_id', 'taste_id');
}
}

