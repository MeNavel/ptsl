<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidomekar extends Model
{
    use HasFactory;
    protected $table = 'sidomekar';
    protected $guarded = [];
    public $timestamps = false;
}
