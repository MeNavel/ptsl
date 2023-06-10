<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidorejo extends Model
{
    use HasFactory;
    protected $table = 'sidorejo';
    protected $guarded = [];
    public $timestamps = false;
}
