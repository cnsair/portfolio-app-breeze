<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    
    // public const StatusSelect = [
    //     '1' = 'Currently Attending',
    //     '0' = 'Graduated',
    // ];

    protected $fillable = [
        'status',
        'date',
        'course',
        'school',
        'activity',
    ];

}
