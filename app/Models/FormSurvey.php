<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSurvey extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_project',
        'lokasi',
        'nama_pic',
        'nama_surveyor',
        'nama_sales',
        'tgl_survey',
        'no_survey'
    ];

    public function formdata()
    {
        return $this->hasMany(FormData::class);
    }
}
