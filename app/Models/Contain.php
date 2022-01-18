<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{

    protected $fillable = [
        'quantity','ingredient_id','plate_id'
    ];

    use HasFactory;
}
