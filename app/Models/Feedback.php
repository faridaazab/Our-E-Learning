<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory };

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }
    public function create_user(){
        return $this->belongsTo(User::class, 'create_user_id');
    }

    public function update_user(){
        return $this->belongsTo(User::class , 'update_user_id');
    }

    public function student(){
        return $this->belongsTo(User::class , 'student_id');
    }
}
