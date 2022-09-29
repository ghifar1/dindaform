<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_survey_id',
        'jenis_barang',
        'nama_barang',
        'type_merek',
        'qty',
        'ukur',
        'keterangan'
    ];
}
