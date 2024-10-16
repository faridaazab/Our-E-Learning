<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    SoftDeletes,
    Model,
    Factories\HasFactory };

class Course extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded=[];

    public function create_user(){
        return $this->belongsTo(User::class , 'create_user_id');
    }

    public function update_user(){
        return $this->belongsTo(User::class , 'update_user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function instructor(){
        return $this->belongsTo(User::class , 'instructor_id');}


    public function users(){
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')
        ->withTimestamps();
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}

