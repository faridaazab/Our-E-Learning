<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class Session extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function create_user(){
        return $this->belongsTo(User::class , 'create_user_id');

    }

    public function update_user(){
        return $this->belongsTo(User::class , 'update_user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }


}
