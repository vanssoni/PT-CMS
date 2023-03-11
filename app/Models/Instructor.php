<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'courses_name',
    ];

    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function courses(){
        return $this->hasMany(InstructorCourse::class,'instructor_id', 'id');
    }
    public function subjects(){
        return $this->hasMany(InstructorSubject::class,'instructor_id', 'id');
    }
    
    public function  getCoursesNameAttribute(){
        if(isset($this->courses)){
            
            $courseIds = $this->courses()->pluck('course_id')->toArray();
            return implode(',',Course::whereIn('id', $courseIds)->pluck('name')->toArray());
        }
    }
}
