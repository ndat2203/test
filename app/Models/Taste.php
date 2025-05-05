<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taste extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'taste_name',
        'taste_status',
    ];
    protected $primaryKey = 'taste_id';
    protected $table = 'tbl_taste';

}
