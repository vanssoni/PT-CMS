<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
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
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
    public function getMinutesAttribute(){
        if(isset($this->attributes['hours']) ){
            // Calculate the difference in minutes
            return $this->attributes['hours']*60;
        }
    }
}
