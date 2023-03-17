<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public $appends = [
        'minutes',
    ];

    public function course(){
        
        return $this->hasOne(Course::class, 'id','course_id');
    }

    public function subject(){

        return $this->hasOne(Subject::class, 'id','subject_id');
    }
    public function instructor(){

        return $this->hasOne(Instructor::class,'id', 'instructor_id');
    }
    public function students(){

        return $this->hasOne(StudentSchedule::class,'schedule_id', 'id');
    }
    public function breaks(){

        return $this->hasMany(ScheduleBreak::class,'schedule_id', 'id');
    }
    public function getMinutesAttribute(){
        if(isset($this->attributes['from_time']) && isset($this->attributes['to_time'])){
            $fromDate = \Carbon\Carbon::parse($this->attributes['from_time']);
            $toDate =  \Carbon\Carbon::parse($this->attributes['to_time']);
            // Calculate the difference in minutes
            return $toDate->diffInMinutes($fromDate);
        }
    }
    
}
