<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'admin_email',
        'admin_password',
        'brand_status',
        'admin_name',
        'admin_phone',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'tbl_admin';
}
