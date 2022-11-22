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
        'input1',
        'input2',
        'output1',
        'input3',
        'input4',
        'output2',
         'user_id'

    ];
}
