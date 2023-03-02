<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfForm extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function getProfilePicAttribute(){
        $pdf = @$this->attributes['pdf'] ? url('/storage/pdf-forms/'.@$this->attributes['pdf']) : '';
        return $profile_pic;
    }
}
