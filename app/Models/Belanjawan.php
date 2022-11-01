<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belanjawan extends Model
{
   // use HasFactory;
    protected $table = 'belanjawan';
    protected $fillable = [

      // 'nama_agensi',
        'id',
        'input1',
        'input2',
        'output1',
        'input3',
        'input4',
        'output2',
        'output3',
        'user_id'
    ];
}
