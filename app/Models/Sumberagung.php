<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberagung extends Model
{
    use HasFactory;
    protected $table = 'sumberagung';
    protected $guarded = [];
    public $timestamps = false;
}
