<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'position',
        'salary',
        'joined_at',
    ];

    protected function casts(): array
    {
        return [
            'salary' => 'decimal:2',
            'joined_at' => 'date',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}