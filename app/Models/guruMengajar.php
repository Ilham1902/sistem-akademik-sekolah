<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guruMengajar extends Model
{
    use HasFactory;
    protected $table = 'absen_guru';
    protected $guarded = ['id'];
}
