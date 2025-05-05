<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'comment',
        'comment_username',
        'comment_date',
        'comment_product_id',
        'comment_status',
        'comment_parent',
        'comment_rating'

    ];
    protected $primaryKey = 'comment_id';
    protected $table = 'tbl_comment';
    public function product()
    {
        return $this->belongsTo(Product::class, 'comment_product_id', 'product_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_parent');
    }

}
