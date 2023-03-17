<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'courses_name',
        'name'
    ];

    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function courses(){
        return $this->hasMany(StudentCourse::class,'student_id', 'id');
    }
    public function road_tests(){
        return $this->hasMany(RoadTest::class,'student_id', 'id');
    }
    
    public function  getCoursesNameAttribute(){
        if(isset($this->courses)){
            
            $courseIds = $this->courses()->pluck('course_id')->toArray();
            return implode(',',Course::whereIn('id', $courseIds)->pluck('name')->toArray());
        }
    }
    public function getDobAttribute(){
        if(isset($this->attributes['dob']))
        return date('Y-m-d', strtotime($this->attributes['dob']));
    }

    public function getExpiryAttribute(){
        if(isset($this->attributes['expiry']))
        return date('Y-m-d', strtotime($this->attributes['expiry']));
    }

    public function getRegistrationDateAttribute(){
        if(isset($this->attributes['registration_date']))
        return date('Y-m-d', strtotime($this->attributes['registration_date']));
    }
    public function getNameAttribute(){
        if($this->user)
        return $this->user->first_name.' '.$this->user->last_name;
    }
}
