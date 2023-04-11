<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Student extends Model
{
    use HasFactory,Filterable;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'courses_name',
        'name',
        'total_fees',
        'remaining_fees',
        'paid_fees',
        'first_course_id',
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
    public function fees(){
        return $this->hasMany(Fee::class,'student_id', 'id');
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

    public function getTotalFeesAttribute(){
        if(isset($this->courses)){
            
            $courseIds = $this->courses()->pluck('course_id')->toArray();
            return Course::whereIn('id', $courseIds)->sum('fees');
        }
    }
    public function getRemainingFeesAttribute(){
        if(isset($this->courses) && isset($this->attributes['id'])){
            
            $courseIds = $this->courses()->pluck('course_id')->toArray();
            $totalFee =  Course::whereIn('id', $courseIds)->sum('fees');
            $paidFee =   Fee::where('student_id', $this->attributes['id'])->sum('amount');
            if($totalFee ){
                return number_format($totalFee-$paidFee, 2, '.', '');
            }
        }
        return 0.00;
    }
    public function getPaidFeesAttribute(){
        if( isset($this->attributes['id'])){
            
            return Fee::where('student_id', $this->attributes['id'])->sum('amount');
        }
        return 0.00;
    }

    public function getFirstCourseIdAttribute(){
        if(isset($this->courses)){
            return $this->courses()->pluck('course_id')->first();
        }
    }
    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\StudentFilter::class);
    }
}
