<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trash_collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_date',
        'collection_barangay',
        'collection_kilogram',
        'collection_type',
        'collection_driver',
    ];
    
}
