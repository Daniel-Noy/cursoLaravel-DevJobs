<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'deadline',
        'description',
        'image',
        'is_published',
        'user_id'
    ];
}
