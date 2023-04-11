<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Fee extends Model
{
    use HasFactory,Filterable;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'pending_amount'
    ];

    
    public function student(){

        return $this->hasOne(Student::class,'id', 'student_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id', 'received_by');
    }
    public function getPendingAmountAttribute(){
        if($this->attributes['student_id'] && $this->attributes['course_id']){
            return getPendingAmountTillTheId($this->attributes['id'], $this->attributes['student_id'] , $this->attributes['course_id']);
        }
        return 0.00;
    }
}
