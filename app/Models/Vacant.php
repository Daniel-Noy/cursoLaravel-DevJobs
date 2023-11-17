<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Illuminate\Support\Carbon;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->select([
            'name'
        ]);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class)->select([
            'salary'
        ]);
    }

    protected function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function applicants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'applicants');
    }
}
