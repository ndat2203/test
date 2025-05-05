<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryPost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'cate_post_name',
        'cate_post_status',
        'cate_post_slug',
        'cate_post_desc'
    ];
    protected $primaryKey = 'cate_post_id';
    protected $table = 'tbl_category_post';
    // cú pháp đầy đủ của belongTo(): $this->belongsTo(Model::class, 'foreign_key', 'owner_key');
    // cú pháp đầy đủ của hasMany():  $this->hasMany(Model::class, 'foreign_key', 'local_key');
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'cate_post_id', 'cate_post_id');
    }
}
