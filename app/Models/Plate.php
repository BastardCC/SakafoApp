<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    protected $fillable = [
        'plate_name', 'recipe', 'plate_image'
    ];

    protected $primaryKey = 'plate_id';

    use HasFactory;
}
