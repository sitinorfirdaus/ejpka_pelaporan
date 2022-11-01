<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Belanjawan extends Model

{
   protected $table = 'belanjawan';
    //use HasFactory;


    protected $fillable = [

        'input1',
        // 'input2',
        // 'output1',
        // 'input3',
        // 'input4',
        // 'output2',
        // 'output3',
        // 'total',
        'id_user',
    ];



}
