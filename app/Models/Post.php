<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'post_title',
        'post_desc',
        'post_image',
        'post_status',
        'post_content',
        'post_view',
        'cate_post_id',
        'post_slug'


    ];
    protected $primaryKey = 'post_id';
    protected $table = 'tbl_post';
    public function category()
    {
        return $this->belongsTo('App\Models\categoryPost', 'cate_post_id', 'cate_post_id');
    }
}
