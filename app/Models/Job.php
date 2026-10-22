<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database secara eksplisit
    protected $table = 'jobs';

    // Kolom yang boleh diisi
    protected $fillable = [
        'title', 'company', 'location', 'salary', 'type', 'requirements', 'posted_date', 'description', 'image'
    ];
}