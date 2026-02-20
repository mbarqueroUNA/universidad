<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'capacity',
        'start_date',
        'end_date',
    ];

    // Relación con enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
