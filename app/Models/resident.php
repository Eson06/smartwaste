<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'birthdate',
        'barangay',
        'contact',
        'email',
        'house_no',
        'purok',
        'occupation',
        'civil_status',
        'nationality',
    ];
}
