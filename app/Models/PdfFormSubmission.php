<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFormSubmission extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function getPdfAttribute(){
        $pdf = @$this->attributes['pdf'] ? url('/storage/pdf-form-submissions/'.@$this->attributes['pdf']) : '';
        return $pdf;
    }
    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }
    public function pdf_form(){
        return $this->hasOne(PdfForm::class,'id', 'form_id');
    }
}
