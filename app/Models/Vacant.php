<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    protected $casts = [
        'deadline' => 'date'
    ];

    protected function deadline(): Attribute
    {
        return Attribute::get(fn ($value) => Carbon::parse($value)->format('Y-m-d'));
    }
}
