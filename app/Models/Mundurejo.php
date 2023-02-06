<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mundurejo extends Model
{
    use HasFactory;
    protected $table = 'mundurejo';
    protected $guarded = [];
    public $timestamps = false;
}
