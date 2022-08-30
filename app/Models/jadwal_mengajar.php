<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_mengajar extends Model
{
    use HasFactory;
    protected $table = 'jadwal_mengajar';
    protected $guarded = ['id'];
}
