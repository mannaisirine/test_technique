<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Colonnes que l'on peut remplir via create() ou update()
    protected $fillable = [
        'title',
        'description',
        'priority',
        'due_date',
        'user_email'
    ];
}
