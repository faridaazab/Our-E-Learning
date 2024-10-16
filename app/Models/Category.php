<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    SoftDeletes,
    Model,
    Factories\HasFactory };

class Category extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded=[];

    public function create_user(){
        return $this->belongsTo(User::class , 'create_user_id');
    }

    public function update_user(){
        return $this->belongsTo(User::class , 'update_user_id');
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
