<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'fee',
        'quota',
        'start_date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
        ];
    }

    /**
     * Relasi One-to-Many ke model Enrollment.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Relasi Many-to-Many konseptual ke Participant melalui Enrollment.
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
            ->withPivot('status')
            ->withTimestamps();
    }
}