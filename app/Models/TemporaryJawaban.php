<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryJawaban extends Model
{
    use HasFactory;
    protected $fillable = [
        'warga_id',
        'pertanyaan_id',
        'jawaban',
        'user_id'
    ];
}
