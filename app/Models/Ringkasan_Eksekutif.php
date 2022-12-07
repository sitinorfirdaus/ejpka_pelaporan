<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ringkasan_Eksekutif extends Model
{
    use HasFactory;
    protected $table = 'ringkasan_eksekutif';
    protected $fillable = [
        'master_id',
        'pengurusan_belanjawan',
        'pengurusan_perakaunan',
        'perakaunan_kewangan',
        'perakaunan_pengurusan',
        'pengurusan_perolehan',
        'pengurusan_aset_stor',
         'created_by'

    ];
}
