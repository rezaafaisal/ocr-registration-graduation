<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveQuota extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quota',
        'start_date',
        'end_date',
        'status',
    ];

    public function registrars()
    {
        return $this->hasMany(ArchiveRegistrar::class);
    }
}
