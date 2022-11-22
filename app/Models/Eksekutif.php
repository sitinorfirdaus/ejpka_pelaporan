<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eksekutif extends Model
{
    use HasFactory;
    protected $table = 'master';
    protected $fillable =['sukuan','tahun','tarikh','user_id'];
    //protected $fillable =['tarikh','user_id'];

}


