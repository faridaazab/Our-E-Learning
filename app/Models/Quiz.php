<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    SoftDeletes,
    Model,
    Factories\HasFactory };

class Quiz extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded=[];
}
